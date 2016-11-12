<?php
namespace Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class CompraRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new CompraRepository(new Adapter($config['db']), new CompraHydrator(), new Compra());
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }

}
