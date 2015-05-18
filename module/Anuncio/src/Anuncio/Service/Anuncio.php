<?php
namespace Anuncio\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Anuncio\Entity\Anuncio as Entity;

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

    /**
     * Obtem o anúncio a partir no id
     * @param int $id
     * @return Entity
     */
    public function getAnuncio($id)
    {
        return $this->getMapper()->findById($id);
    }
    
    public function salvar(Entity $entity)
    {
        return $this->getMapper()->save($entity);
    }
    
    public function remover(Entity $entity)
    {
        return $this->getMapper()->removeById($entity->getId());
    }
}