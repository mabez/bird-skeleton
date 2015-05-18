<?php
namespace Login\Mapper;

use Zend\Authentication\AuthenticationService;
use Login\Entity\Identificacao as Entity;

/**
 *
 */
class Identificacao
{
    
    private $authenticationService;
    
    public function __construct()
    {
        $this->authenticationService = new AuthenticationService();
        
    }
    
    /**
     * @return \Login\Entity\Identificacao
     */
    public function find()
    {
        $entity = new Entity();
        if (!$this->getStorage()->isEmpty()) {
            $entity->setValor($this->getStorage()->read());
        }
        return $entity;
    }
    
    /**
     * @param \Login\Entity\Identificacao $entity
     */
    public function save(Entity $entity)
    {
        return $this->getStorage()->write($entity->getValor());
    }
    
    public function delete()
    {
        return $this->getStorage()->clear();
    }
    
    /**
    * @return \Zend\Authentication\Storage\StorageInterface
     */
    private function getStorage()
    {
        return $this->authenticationService->getStorage('bs_identificacao');
    }
}
