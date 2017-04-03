<?php
namespace ValorTotalCompraFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ValorTotalCompra\ViewHelper as Service;

class ViewHelper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Service($container->get('CompraManager'));
    }
}
