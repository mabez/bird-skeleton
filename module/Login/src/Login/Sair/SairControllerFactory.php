<?php
namespace Login\Sair;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SairControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SairController($serviceLocator->getServiceLocator()->get('LoginViewModel'));
    }
}
