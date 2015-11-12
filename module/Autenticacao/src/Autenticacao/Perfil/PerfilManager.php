<?php
namespace Autenticacao\Perfil;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class PerfilManager implements ServiceManagerAwareInterface
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
     * @return PerfilRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('PerfilRepository');
    }

    /**
     * Econtra Perfil a partir do id
     * @param int $perfilId
     * @return \Autenticacao\PerfilManager
     */
    public function obterPerfil($perfilId)
    {
        return $this->getRepository()->findById($perfilId);
    }

    /**
     * Econtra Perfil a partir do nome
     * @param string $nome
     * @return \Autenticacao\PerfilManager
     */
    public function obterPerfilByNome($nome)
    {
        return $this->getRepository()->findByNome($nome);
    }
}
