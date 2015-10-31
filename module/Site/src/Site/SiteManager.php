<?php
namespace Site;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class SiteManager implements ServiceManagerAwareInterface
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
     * @return SiteRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('SiteRepository');
    }

    /**
     * Obtem um objeto com as informações do site padrão
     * @return Site
     */
    public function getSiteDefault()
    {
        return $this->getRepository()->find();
    }
    
    /**
     * Salva o site passado por parâmetro
     * @param Site $site
     */
    public function salvar(Site $site)
    {
        return $this->getRepository()->save($site);
    }
}