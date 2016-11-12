<?php
namespace AcessoFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Acesso\AcessoController;
use Interop\Container\ContainerInterface;

class AcessoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AcessoController($serviceLocator->getServiceLocator()->get('AcessoViewModel'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}

// use Interop\Container\ContainerInterface;

// public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
// {

// }
