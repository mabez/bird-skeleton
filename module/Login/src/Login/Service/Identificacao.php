<?php
namespace Login\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Login\Entity\Identificacao as Entity;

class Identificacao implements ServiceManagerAwareInterface
{
    private $serviceManager; 

    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }
    
    private function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    private function getMapper()
    {
        return $this->getServiceManager()->get('IdentificacaoMapper');
    }
    
    public function save(Entity $entity)
    {
        return $this->getMapper()->save($entity);
    }
    
    public function get()
    {
        return $this->getMapper()->find();
    }
}