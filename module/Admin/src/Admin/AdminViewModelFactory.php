<?php
namespace Admin;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AdminViewModel(
            $serviceLocator->get('config')['admin_routes']
        );
    }
}
