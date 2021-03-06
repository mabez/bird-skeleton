<?php
namespace BirdSkeleton\Compra;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Compra\Manager as Service;

class Manager implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Service(
            $container->get('CompraRepository'),
            $container->get('CompraStatusManager'),
            $container->get('ProdutoManager'),
            $container->get('AutenticacaoManager')
        );
    }
}
