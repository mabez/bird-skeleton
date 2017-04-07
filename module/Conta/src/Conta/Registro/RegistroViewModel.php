<?php
namespace Conta\Registro;

use Ecompassaro\Autenticacao\Manager as AutenticacaoManager;
use Zend\Authentication\AuthenticationService;
use Notificacao\Notificacao;
use Ecompassaro\Autenticacao\Autenticacao;
use Acesso\Acesso;
use Conta\ContaViewModel;
use Notificacao\NotificacoesContainerTrait;

/**
 * Gerador da estrutura da página de registro da conta
 */
class RegistroViewModel extends ContaViewModel
{
    use NotificacoesContainerTrait;

    const MESSAGE_UPDATE_SUCCESS = 'Dados modificados com sucesso!';
    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao salvar os dados!';

    private $autenticacaoManager;
    protected $form;
    protected $usuario;

    /**
     * Injeta as dependências
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     * @param RegistroForm $form
     * @param mixed $params
     */
    public function __construct(Acesso $acesso, AuthenticationService $authentication, AutenticacaoManager $autenticacaoManager, RegistroForm $form, $params = array())
    {
        parent::__construct($acesso);
        extract($params);
        if (!isset($redirect)) $redirect = null;

        $this->usuario = $authentication->getIdentity();
        $this->setDescricaoPagina('Modificando meus dados.');
        $form->setEntity($this->usuario);
        $form->setRouteRedirect($redirect);
        $form->prepare();
        $this->variables['formulario'] = $form;
        $this->variables['routeRedirect'] = $redirect;
        $this->autenticacaoManager = $autenticacaoManager;
        $this->form = $form;
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
            $usuario->setId($this->usuario->getId());
            $usuario->setPerfilId($this->usuario->getPerfilId());
            $usuario = $this->autenticacaoManager->salvar($usuario);
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, self::MESSAGE_UPDATE_SUCCESS, array($usuario->getId())));
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array($usuario->getId())));
        }

        return true;
    }

    public function getForm()
    {
        return $this->form;
    }
}
