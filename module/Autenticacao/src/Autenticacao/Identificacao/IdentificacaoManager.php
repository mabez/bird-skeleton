<?php
namespace Autenticacao\Identificacao;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class IdentificacaoManager implements ServiceManagerAwareInterface
{
    private $serviceManager; 
    
    /**
     * Insere o serviceManager
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     * @see \Zend\ServiceManager\ServiceManagerAwareInterface::setServiceManager()
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }
    
    /**
     * Obtem o serviceManager
     * @return \Zend\ServiceManager\ServiceManager
     */
    private function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    /**
     * Obtem o Repository dessa entidade
     * @return IdentificacaoRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('IdentificacaoRepository');
    }
    
    /**
     * Salva a identificação passada por parâmetro
     */
    public function save(Identificacao $identificacao)
    {
        return $this->getRepository()->save($identificacao);
    }
    
    /**
     * Obtem a identificação atual (se houver)
     * @return Identificacao
     */
    public function get()
    {
        return $this->getRepository()->find();
    }
}