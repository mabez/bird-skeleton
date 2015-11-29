<?php
namespace Compra\Status;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class StatusRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new StatusRepository(new Adapter($config['db']), new StatusHydrator(), new Status());
    }
}
