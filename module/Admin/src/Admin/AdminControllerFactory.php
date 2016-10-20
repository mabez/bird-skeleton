<?php
namespace Admin;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AdminController($serviceLocator->getServiceLocator()->get('AdminViewModel'));
    }
}
