<?php
namespace Site\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Site\Entity\Site as Entity;

class Site implements ServiceManagerAwareInterface
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
        return $this->getServiceManager()->get('SiteMapper');
    }

    /**
     * Obtem um objeto com as informações do site padrão
     * @return \Application\Entity\Site
     */
    public function getSiteDefault()
    {
        return $this->getMapper()->find();
    }
    
    public function salvar(Entity $entity)
    {
        return $this->getMapper()->save($entity);
    }

}