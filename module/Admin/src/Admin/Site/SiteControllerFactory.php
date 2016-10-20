<?php
namespace Admin\Site;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SiteControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SiteController(
            $serviceLocator->getServiceLocator()->get('AdminSiteViewModel')
        );
    }
}
