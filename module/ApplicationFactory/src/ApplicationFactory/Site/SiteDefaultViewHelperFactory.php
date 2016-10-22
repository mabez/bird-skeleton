<?php
namespace ApplicationFactory\Site;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;
use Application\Site\SiteDefaultViewHelper;

class SiteDefaultViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SiteDefaultViewHelper(
            $serviceLocator->getServiceLocator()->get('SiteManager'),
            new Container('Site')
        );
    }
}