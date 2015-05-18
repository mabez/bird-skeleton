<?php
namespace Login\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Login\Mapper\Login as Mapper;
use Zend\Db\Adapter\Adapter;

class LoginMapper implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new Mapper(new Adapter($config['db']));
    }

}
