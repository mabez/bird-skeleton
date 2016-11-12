<?php
namespace ApplicationFactory\Site;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Site\SiteController;
use Interop\Container\ContainerInterface;

class SiteControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SiteController($serviceLocator->getServiceLocator()->get('AcessoViewModel'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
