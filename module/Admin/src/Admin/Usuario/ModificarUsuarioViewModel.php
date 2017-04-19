<?php
namespace Admin\Usuario;

use Ecompassaro\Autenticacao\Manager as AutenticacaoManager;
use Ecompassaro\Autenticacao\Autenticacao;
use Ecompassaro\Acesso\Acesso;
use Zend\View\Model\ViewModel;
use Ecompassaro\Notificacao\NotificacoesContainerTrait;
use Ecompassaro\Notificacao\Notificacao;
use Admin\ModificarViewModelInterface;

/**
 * Gerador da estrutura da página de administração de informações do usuário
 */
class ModificarUsuarioViewModel extends ViewModel implements ModificarViewModelInterface
{
    use NotificacoesContainerTrait;

    const MESSAGE_UPDATE_SUCCESS = 'Usuário #%s modificado com sucesso!';
    const MESSAGE_INSERT_SUCCESS = 'Usuário #%s incluído com sucesso!';
    const MESSAGE_REMOVE_SUCCESS = 'Usuário #%s removido com sucesso!';
    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao modificar o usuário #%s!';
    const MESSAGE_REMOVE_INTERNAL_ERROR = 'Ocorreu um erro ao deletar o usuário #%s, verifique se ele já não possui compra!';

    private $autenticacaoManager;
    protected $form;

    /**
     * Injeta as dependências
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     * @param UsuarioForm $form
     * @param mixed $params
     */
    public function __construct(AutenticacaoManager $autenticacaoManager, UsuarioForm $form, $params = array())
    {
        extract($params);
        if (!isset($usuarioId)) $usuarioId = null;
        if (!isset($redirect)) $redirect = null;

        $usuario = $autenticacaoManager->obterAutenticacaoBasica($usuarioId);
        $isNew = false;
        if (!($usuario instanceof Autenticacao)) {
            $usuario = new Autenticacao();
            $isNew = true;
        }

        $this->variables['pagina'] = array('descricao' => $this->getDescricao($usuarioId));
        $form->setEntity($usuario);
        $form->setNew($isNew);
        $form->setRouteRedirect($redirect);
        $form->prepare();
        $this->variables['formulario'] = $form;
        $this->variables['routeRedirect'] = $redirect;
        $this->autenticacaoManager = $autenticacaoManager;
        $this->form = $form;
    }

    /**
     * Obtem a descrição da página
     * @param string $id do usuário que está sendo modificado (opcional)
     */
    public function getDescricao($id = null)
    {
        if ($id) {
            return 'Modificar o usuário #'.$id;
        }
        return 'Incluir um usuário';
    }


    /**
     * Salva um usuário a partir de um array
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $usuario = new Autenticacao();
            $usuario->exchangeArray($array);


            $id = $usuario->getId();
            if ($id == 0) {
                $messageSuccess = self::MESSAGE_INSERT_SUCCESS;
                $perfilId = $this->autenticacaoManager->getPerfilManager()->obterPerfilByNome(Acesso::getDefaultRole())->getId();
            } else {
                $messageSuccess = self::MESSAGE_UPDATE_SUCCESS;
                $perfilId = $this->autenticacaoManager->obterAutenticacaoBasica($id)->getPerfilId();
            }
            $usuario->setPerfilId($perfilId);

            $usuario = $this->autenticacaoManager->salvar($usuario);
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, $messageSuccess, array($usuario->getId())));
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array($id)));
        }

        return true;
    }

    /**
     * Remove um usuário a partir de um id
     * @param mixed $id a da instancia a ser removida
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function remove($id)
    {
        try {
            $usuario = new Autenticacao();
            $usuario->setId($id);

            $this->autenticacaoManager->remover($usuario);
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, self::MESSAGE_REMOVE_SUCCESS, array($id)));
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MESSAGE_REMOVE_INTERNAL_ERROR, array($id)));
        }

        return true;
    }

    public function getForm()
    {
        return $this->form;
    }
}
