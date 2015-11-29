<?php
namespace Application\Site;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;

class SiteDefaultViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SiteDefaultViewHelper(
            $serviceLocator->getServiceLocator()->get('SiteManager'),
            new Container('Site')
        );
    }
}
