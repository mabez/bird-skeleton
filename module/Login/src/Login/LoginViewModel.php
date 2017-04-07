<?php
namespace Login;

use Ecompassaro\Autenticacao\Autenticacao;
use Ecompassaro\Autenticacao\Manager as AutenticacaoManager;
use Notificacao\Notificacao;
use Notificacao\NotificacoesContainerTrait;
use Zend\Authentication\AuthenticationService;
use Acesso\AcessoViewModel;
use Acesso\Acesso;

/**
 * Gerador da estrutura da página de login
 */
class LoginViewModel extends AcessoViewModel
{
    use NotificacoesContainerTrait;

    const MENSAGEM_ERRO_LOGIN_INVALIDO = 'Usuario ou senha inválidos.';

    private $authenticationService;
    private $autenticacaoManager;
    private $form;

    /**
     * Injeta dependências
     * @param \Acesso\Acesso
     * @param \AutenticacaoManager $autenticacaoManager
     * @param LoginForm $form
     */
    public function __construct(Acesso $acesso, AuthenticationService $authenticationService, AutenticacaoManager $autenticacaoManager, LoginForm $form)
    {
        parent::__construct($acesso);
        $this->authenticationService = $authenticationService;
        $this->autenticacaoManager = $autenticacaoManager;
        $this->form = $form;
        $this->variables['formulario'] = $form;
    }

    /**
     * Adiciona Mensagem de erro
     * @return LoginViewModel
     */
    private function addMensagemErro()
    {
       return $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MENSAGEM_ERRO_LOGIN_INVALIDO));
    }

    /**
     * Obtem o formulário de login
     * @return LoginForm
     */
    public function getFormulario($routeRedirect = null)
    {
        return $this->form->setRouteRedirect($routeRedirect);
    }

    /**
     * Verifica se existe um login com o usuário e senha informados
     * Se não existir além de retornar false seta uma mensagem de erro no atributo
     * da classe.
     * @param string $usuario
     * @param string $senha
     * @return boolean
     */
    public function validaLogin($dados)
    {
        $this->getFormulario()->setData($dados);

        if ($this->getFormulario()->isValid()) {
            $autenticacao = new Autenticacao();
            $autenticacao->exchangeArray($this->getFormulario()->getData());

            $resultadoAutenticacao = $this->autenticacaoManager->autenticar($autenticacao);

            if (!$resultadoAutenticacao->isValid()) {
                $this->addMensagemErro();
                return false;
            }

            return true;
        }

        return false;
    }

    public function limparAutenticacao()
    {
        $this->authenticationService->clearIdentity();
    }
}
