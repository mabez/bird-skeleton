<?php
namespace CompraFactory\Status;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Compra\Status\Manager as Service;

class Manager implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Service(
            $container->get('CompraStatusRepository')
        );
    }
}
