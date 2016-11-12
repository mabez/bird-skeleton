<?php
namespace Login\Registrar;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class RegistrarControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistrarController(
            $serviceLocator->getServiceLocator()->get('RegistrarViewModel'),
            $serviceLocator->getServiceLocator()->get('LoginViewModel')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
