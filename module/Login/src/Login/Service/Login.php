<?php
namespace Login\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Login\Adapter\Login as LoginAdapter;

class Login implements ServiceManagerAwareInterface
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
        return $this->getServiceManager()->get('LoginMapper');
    }

    /**
     * Econtra login a partir do usuario e senha
     * @param string $usuario
     * @param string $senha
     * @return \Login\Entity\Login
     */
    public function obterLogin($usuario, $senha)
    {
        return $this->getMapper()->findByUsuarioSenha($usuario, $senha);
    }
    
    /**
     * @param string $usuario
     * @param string $senha
     * @return \Zend\Authentication\Result
     */
    public function autenticar($usuario, $senha)
    {
        return $this->getServiceManager()->get('LoginAdapter')
            ->setUsuario($usuario)
            ->setSenha($senha)
            ->authenticate();
    }
}
