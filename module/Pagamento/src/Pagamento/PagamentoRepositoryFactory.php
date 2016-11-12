<?php
namespace Pagamento;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class PagamentoRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new PagamentoRepository(new Adapter($config['db']), new PagamentoHydrator(), new Pagamento());
    }
}
