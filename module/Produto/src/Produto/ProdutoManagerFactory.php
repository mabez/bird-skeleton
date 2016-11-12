<?php
namespace Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class ProdutoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutoManager($serviceLocator->get('ProdutoRepository'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
