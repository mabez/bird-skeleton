<?php
namespace Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class ProdutoRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new ProdutoRepository(new Adapter($config['db']), new ProdutoHydrator(), new Produto());
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }

}
