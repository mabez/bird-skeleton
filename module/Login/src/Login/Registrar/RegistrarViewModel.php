<?php
namespace Login\Registrar;

use Acesso\Acesso;
use Autenticacao\AutenticacaoManager;
use Autenticacao\Autenticacao;
use Notificacao\Notificacao;
use Notificacao\NotificacoesContainerTrait;
use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de login
 */
class RegistrarViewModel extends ViewModel
{
    use NotificacoesContainerTrait;
    
    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao regitrar uma conta!';
    const MESSAGE_INSERT_SUCCESS = 'O login foi registrado com sucesso!';
    
    private $autenticacaoManager;
    private $form;

    /**
     * Injeta dependências
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     * @param RegistrarForm $form
     */
    public function __construct(AutenticacaoManager $autenticacaoManager, RegistrarForm $form)
    {
        $this->autenticacaoManager = $autenticacaoManager;
        $this->form = $form;
        $this->variables['formulario'] = $form;
    }

    /**
     * Obtem o formulário de registrar login
     * @return RegistrarForm
     */
    public function getFormulario($routeRedirect = null)
    {
        return $this->form->setRouteRedirect($routeRedirect);
    }

    /**
     * Salva um login a partir do formulario
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function save()
    {
        try {
            $autenticacao = new Autenticacao();
            $autenticacao->exchangeArray($this->form->getData());
            $perfilDefault = $this->autenticacaoManager->getPerfilManager()->obterPerfilByNome(Acesso::getDefaultRole());
            $autenticacao = $this->autenticacaoManager->salvar(
                $autenticacao->setPerfilId($perfilDefault->getId())
                    ->setPerfil($perfilDefault)
            );
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, self::MESSAGE_INSERT_SUCCESS));
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR));
        }
        
        return true;
    }
}
