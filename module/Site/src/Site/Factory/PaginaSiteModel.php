<?php
namespace Site\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Site\Model\PaginaSite;

class PaginaSiteModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PaginaSite($serviceLocator->get('Site'));
    }
}
