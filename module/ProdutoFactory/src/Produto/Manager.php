<?php
namespace ProdutoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Produto\ProdutoManager as Service;

class Manager implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Service($container->get('ProdutoRepository'));
    }
}
