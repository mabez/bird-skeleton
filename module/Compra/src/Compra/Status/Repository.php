<?php
namespace BirdSkeleton\Compra\Status;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Ecompassaro\Compra\Status\Hydrator;
use Ecompassaro\Compra\Status;
use Ecompassaro\Compra\Status\Repository as Service;

class Repository implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new Service(new Adapter($config['db']), new Hydrator(), new Status());
    }
}
