<?php
namespace Conta\Registro;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class RegistroControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistroController($serviceLocator->getServiceLocator()->get('ContaRegistroViewModel'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
