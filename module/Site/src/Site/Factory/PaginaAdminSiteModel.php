<?php
namespace Site\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Site\Model\PaginaAdminSite;

class PaginaAdminSiteModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PaginaAdminSite($serviceLocator->get('Site'));
    }
}
