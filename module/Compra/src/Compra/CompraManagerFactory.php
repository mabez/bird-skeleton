<?php
namespace Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class CompraManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new CompraManager(
            $serviceLocator->get('CompraRepository'),
            $serviceLocator->get('CompraStatusManager'),
            $serviceLocator->get('ProdutoManager'),
            $serviceLocator->get('AutenticacaoManager')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
