<?php
namespace Login;

use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Login\Identificacao\IdentificacaoGenerator;


/**
 * Adapter para autenticação de login
 */
class LoginAdapter extends AbstractAdapter implements AdapterInterface
{
    private $key = 'bird-skeleton-login';
    private $usuario;
    private $senha;
    private $loginManager;
    private $identificacaoGenerator;

    /**
     * Preenche usuário e senha para autenticação
     * @param string $usuario 
     * @param string $senha
     * @param Login\Identificacao\Identificacao $identificacao
     */
    function __construct(LoginManager $loginManager, IdentificacaoGenerator $identificacaoGenerator)
    {
        $this->loginManager = $loginManager;
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
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface Se a autenticação não acontecer
     */
    public function authenticate()
    {
        $crypted = password_hash($this->senha, PASSWORD_BCRYPT, array('salt'=>sha1($this->key)));
        $login = $this->loginManager->obterLogin($this->usuario, $crypted);
        if ($login instanceof Login) {
            
            $this->setIdentity($this->identificacaoGenerator->generate($login));
            
            return new Result(Result::SUCCESS, $this->getIdentity());
        }
       
        return new Result(Result::FAILURE, $this->getIdentity());
    }
}
