<?php
namespace Compra;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class CompraManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CompraManager(
            $container->get('CompraRepository'),
            $container->get('CompraStatusManager'),
            $container->get('ProdutoManager'),
            $container->get('AutenticacaoManager')
        );
    }
}
