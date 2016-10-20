<?php
namespace Login;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new LoginController($serviceLocator->getServiceLocator()->get('LoginViewModel'));
    }
}
