<?php
namespace Site;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class SiteRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new SiteRepository(new Adapter($config['db']));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
