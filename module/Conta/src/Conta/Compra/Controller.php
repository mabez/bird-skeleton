<?php
namespace BirdSkeleton\Conta\Compra;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Conta\Compra\Controller as CompraController;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CompraController($container->get('ContaCompraViewModel'));
    }
}
