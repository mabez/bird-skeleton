<?php
namespace Compra\Status;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class StatusManager implements ServiceManagerAwareInterface
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
     * @return StatusRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('CompraStatusRepository');
    }
    
    /**
     * Obtem todas os status de compras registrados
     */
    public function obterTodosStatus()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * Obtem o status identificado pelo id
     * @param int $id
     * @return Status
     */
    public function obterStatus($id)
    {
        return $this->getRepository()->findById($id);
    }
    
    /**
     * Obtem o status identificado pelo nome
     * @param string $nome
     * @return Status
     */
    public function obterStatusbyNome($nome)
    {
        return $this->getRepository()->findByNome($nome);
    }
}