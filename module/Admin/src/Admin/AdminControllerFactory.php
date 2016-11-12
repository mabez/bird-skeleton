<?php
namespace Admin;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class AdminControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AdminController($serviceLocator->getServiceLocator()->get('AdminViewModel'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }

}
