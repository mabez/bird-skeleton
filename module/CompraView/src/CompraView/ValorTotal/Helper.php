<?php
namespace CompraView\ValorTotal;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\CompraView\ValorTotal\Helper as Service;

class Helper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Service($container->get('CompraManager'));
    }
}
