<?php
namespace Pagamento;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class PagamentoRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new PagamentoRepository(new Adapter($config['db']), new PagamentoHydrator(), new Pagamento());
    }

}
