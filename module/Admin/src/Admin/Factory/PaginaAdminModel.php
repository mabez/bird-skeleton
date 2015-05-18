<?php
namespace Admin\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Admin\Model\PaginaAdmin;

class PaginaAdminModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $zendConfig = $serviceLocator->get('config');
        return new PaginaAdmin($zendConfig['admin_entidades']);
    }
}
