<?php
namespace Admin\Site;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;

class SiteViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SiteViewModel(
            $serviceLocator->get('SiteManager'),
            new SiteForm(),
            new Container('Site')
        );
    }
}
