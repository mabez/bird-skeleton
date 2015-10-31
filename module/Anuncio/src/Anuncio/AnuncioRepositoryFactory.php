<?php
namespace Anuncio;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class AnuncioRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new AnuncioRepository(new Adapter($config['db']), new AnuncioHydrator(), new Anuncio());
    }

}
