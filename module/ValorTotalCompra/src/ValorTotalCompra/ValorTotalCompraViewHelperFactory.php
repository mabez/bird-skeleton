<?php
namespace ValorTotalCompra;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class ValorTotalCompraViewHelperFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ValorTotalCompraViewHelper($container->get('CompraManager'));
    }
}
