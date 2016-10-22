<?php
namespace Conta\Registro;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistroControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistroController($serviceLocator->getServiceLocator()->get('ContaRegistroViewModel'));
    }
}
