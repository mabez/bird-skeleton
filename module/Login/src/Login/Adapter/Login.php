<?php
namespace Login\Adapter;

use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Login\Service\Login as LoginService;
use Login\Model\IdentificacaoGenerator;
use Login\Entity\Login as Entity;
use Login\Exception\Autenticacao as AutenticacaoException;

/**
 * Adapter para autenticação de login
 */
class Login extends AbstractAdapter implements AdapterInterface
{
    
    private $usuario;
    private $senha;
    private $loginService;
    private $identificacaoGenerator;

    /**
     * Preenche usuário e senha para autenticação
     * @param string $usuario 
     * @param string $senha
     * @param Login\Entity\Identificacao $identificacao
     */
    function __construct(LoginService $loginService, IdentificacaoGenerator $identificacaoGenerator)
    {
        $this->loginService = $loginService;
        $this->identificacaoGenerator = $identificacaoGenerator;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @param string $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * Efetua a autenticação
     * 
     * @return \Zend\Authentication\Result
     * @throws \Login\Exception\Autenticacao Se a autenticação não acontecer
     */
    public function authenticate()
    {
        try {
            $login = $this->loginService->obterLogin($this->usuario, $this->senha);
            if ($login instanceof Entity) {
                
                $this->setIdentity($this->identificacaoGenerator->generate($login));
                
                return new Result(Result::SUCCESS, $this->getIdentity());
            }
           
            return new Result(Result::FAILURE, $this->getIdentity());
        } catch (\Exception $e) {
            throw new AutenticacaoException();
        }
    }
}
