<?php
namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Mapper\Anuncio as Mapper;
use Zend\Db\Adapter\Adapter;

class AnuncioMapper implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new Mapper(new Adapter($config['db']));
    }

}
