<?php
namespace Login\Model;

use Login\Service\Login as Service;
use Login\Entity\Login as Entity;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

/**
 * Gerador da estrutura da página de login
 */
class PaginaLogin
{
    const MENSAGEM_ERRO_LOGIN_INVALIDO = 'Usuario ou senha inválidos.';
    
    private $mensagemErro;
    private $loginService;

    /**
     * Injeta dependências
     * @param \Login\Service\Login $loginService
     */
    public function __construct(Service $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * @return string
     */
    private function getMensagemErro()
    {
        return $this->mensagemErro;
    }

    /**
     * @param string $mensagemErro
     * @return \Login\Model\PaginaLogin
     */
    private function setMensagemErro($mensagemErro)
    {
        $this->mensagemErro = $mensagemErro;
        return $this;
    }
    
    /**
     * @return \Login\Service\Login
     */
    private function getLoginService()
    {
        return $this->loginService;
    }

    /**
     * Obtem informações complementares da página de login como por exemplo
     * a mensagem de erro.
     * @return array
     */
    public function getInfo()
    {
        return array('mensagemErro' => $this->getMensagemErro());
    }
    
    /**
     * Verifica se existe um login com o usuário e senha informados
     * Se não existir além de retornar false seta uma mensagem de erro no atributo
     * da classe.
     * @param string $usuario
     * @param string $senha
     * @return boolean
     */
    public function validaLogin($usuario, $senha)
    {
        $resultadoAutenticacao = $this->getLoginService()->autenticar($usuario, $senha);
        
        if (!$resultadoAutenticacao->isValid()) {
            $this->setMensagemErro(self::MENSAGEM_ERRO_LOGIN_INVALIDO);
            return false;
        }
        
        return true;
    }
}
