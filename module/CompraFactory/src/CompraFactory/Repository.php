<?php
namespace CompraFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Compra\Repository as Service;
use Compra\Hydrator;
use Compra\Compra;

class Repository implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new Service(new Adapter($config['db']), new Hydrator(), new Compra());
    }
}
