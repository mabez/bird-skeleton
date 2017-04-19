<?php
namespace LoginFactory\Registrar;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class Controller implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RegistrarController(
            $container->get('RegistrarViewModel'),
            $container->get('LoginViewModel')
        );
    }
}
