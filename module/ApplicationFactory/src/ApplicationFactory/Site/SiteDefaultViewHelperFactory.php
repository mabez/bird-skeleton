<?php
namespace ApplicationFactory\Site;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;
use Application\Site\SiteDefaultViewHelper;
use Interop\Container\ContainerInterface;

class SiteDefaultViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SiteDefaultViewHelper(
            $serviceLocator->getServiceLocator()->get('SiteManager'),
            new Container('Site')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}