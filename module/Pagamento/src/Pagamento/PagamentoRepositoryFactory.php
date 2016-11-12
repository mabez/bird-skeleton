<?php
namespace Pagamento;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class PagamentoRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new PagamentoRepository(new Adapter($config['db']), new PagamentoHydrator(), new Pagamento());
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }

}
