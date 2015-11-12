<?php
namespace Autenticacao;

use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Autenticacao\Identificacao\IdentificacaoGenerator;


/**
 * Adapter para autenticação de login
 */
class AutenticacaoAdapter extends AbstractAdapter implements AdapterInterface
{
    private $key = 'bird-skeleton-login';
    private $autenticacao;
    private $loginManager;
    private $identificacaoGenerator;
    private $senhaIsCrypted = false;

    /**
     * Preenche usuário e senha para autenticação
     * @param string $usuario 
     * @param string $senha
     * @param Autenticacao\Identificacao\Identificacao $identificacao
     */
    function __construct(AutenticacaoManager $loginManager, IdentificacaoGenerator $identificacaoGenerator)
    {
        $this->loginManager = $loginManager;
        $this->identificacaoGenerator = $identificacaoGenerator;
    }

    /**
     * @param Autenticacao $autenticacao
     */
    public function setAutenticacao(Autenticacao $autenticacao)
    {
        $this->senhaIsCrypted = false;
        $this->autenticacao = $autenticacao;
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
        $autenticacao = $this->loginManager->obterAutenticacaoCompleta($this->autenticacao->getUsuario(), $this->getCryptedSenha());
        if ($autenticacao instanceof Autenticacao) {
            
            $this->setIdentity($this->identificacaoGenerator->generate($autenticacao));
            
            return new Result(Result::SUCCESS, $this->getIdentity());
        }
       
        return new Result(Result::FAILURE, $this->getIdentity());
    }

    /**
     * Retorna a senha criptografada
     * @return string
     */
    private function getCryptedSenha()
    {
        if (!$this->senhaIsCrypted) {
            $this->senhaIsCrypted = true;
            return password_hash($this->autenticacao->getSenha(), PASSWORD_BCRYPT, array('salt'=>sha1($this->key)));
        }
        
        return $this->autenticacao->getSenha();
    }
    
    /**
     * Retorna um objeto autenticacao preparado para salvar no banco
     */
    public function getPreparedAutenticacao()
    {
        return $this->autenticacao->setSenha($this->getCryptedSenha());
    }
}
