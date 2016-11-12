<?php
namespace Produto;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class ProdutoRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new ProdutoRepository(new Adapter($config['db']), new ProdutoHydrator(), new Produto());
    }
}
