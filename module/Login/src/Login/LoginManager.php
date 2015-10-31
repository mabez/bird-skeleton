<?php
namespace Login;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class LoginManager implements ServiceManagerAwareInterface
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
     * @return LoginRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('LoginRepository');
    }

    /**
     * Econtra login a partir do usuario e senha
     * @param string $usuario
     * @param string $senha
     * @return \LoginManager\Login
     */
    public function obterLogin($usuario, $senha)
    {
        return $this->getRepository()->findByUsuarioSenha($usuario, $senha);
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
