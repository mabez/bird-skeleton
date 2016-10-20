<?php
namespace Login\Registrar;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistrarController(
            $serviceLocator->getServiceLocator()->get('RegistrarViewModel'),
            $serviceLocator->getServiceLocator()->get('LoginViewModel')
        );
    }
}
