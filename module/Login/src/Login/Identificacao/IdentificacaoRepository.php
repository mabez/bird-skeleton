<?php
namespace Login\Identificacao;

use Zend\Authentication\AuthenticationService;

class IdentificacaoRepository
{
    
    private $authenticationService;
    
    /**
     * Constroi Repository criando nele uma instância de 
     * \Zend\Authentication\AuthenticationService
     */
    public function __construct()
    {
        $this->authenticationService = new AuthenticationService();
    }
    
    /**
     * Obtem a identificacao que está no Storage
     * @return Identificacao
     */
    public function find()
    {
        $identificacao = new Identificacao();
        if (!$this->getStorage()->isEmpty()) {
            $identificacao->setValor($this->getStorage()->read());
        }
        return $identificacao;
    }
    
    /**
     * Salva o valor no storage
     * @param Identificacao $identificacao
     */
    public function save(Identificacao $identificacao)
    {
        return $this->getStorage()->write($identificacao->getValor());
    }
    
    /**
     * Limpa o Storage
     */
    public function delete()
    {
        return $this->getStorage()->clear();
    }
    
    /**
     * Obtem o storage 
     * @return \Zend\Authentication\Storage\StorageInterface
     */
    private function getStorage()
    {
        return $this->authenticationService->getStorage('bs_identificacao');
    }
}
