<?php
namespace Application\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class Anuncio implements ServiceManagerAwareInterface
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
        return $this->getServiceManager()->get('AnuncioMapper');
    }

    /**
     * Obtem todos os anuncios
     * @return Iterator
     */
    public function getTodosAnuncios()
    {
        return $this->getMapper()->findAll();
    }

}