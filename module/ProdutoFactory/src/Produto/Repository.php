<?php
namespace ProdutoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Produto\ProdutoRepository as Service;
use Produto\ProdutoHydrator;
use Produto\Produto;

class Repository implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new Service(new Adapter($config['db']), new ProdutoHydrator(), new Produto());
    }
}
