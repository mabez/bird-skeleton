<?php
namespace Login;

use Autenticacao\AutenticacaoManager;
use Application\Site\SiteViewModel;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;
use Application\Site\Mensagem;
use Autenticacao\Autenticacao;

/**
 * Gerador da estrutura da página de login
 */
class LoginViewModel extends SiteViewModel
{
    const MENSAGEM_ERRO_LOGIN_INVALIDO = 'Usuario ou senha inválidos.';

    private $autenticacaoManager;
    private $form;

    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param \AutenticacaoManager $autenticacaoManager
     * @param LoginForm $form
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, AutenticacaoManager $autenticacaoManager, LoginForm $form)
    {
        parent::__construct($siteManager, $authentication, $uri);
        $this->autenticacaoManager = $autenticacaoManager;
        $this->form = $form;
        $this->variables['formulario'] = $form;
    }

    /**
     * Adiciona Mensagem de erro
     * @param string $mensagemErro
     * @return LoginViewModel
     */
    private function addMensagemErro($mensagemErro)
    {
       return $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, $mensagemErro));
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
                $this->addMensagemErro(self::MENSAGEM_ERRO_LOGIN_INVALIDO);
                return false;
            }

            return true;
        }

        return false;
    }
    
    public function limparAutenticacao()
    {
        $this->getAuthentication()->clearIdentity();
    }
}
