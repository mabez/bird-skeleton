<?php
namespace Compra\Status;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StatusManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new StatusManager(
            $serviceLocator->get('CompraStatusRepository')
        );
    }
}
