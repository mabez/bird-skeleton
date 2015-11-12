<?php
namespace Autenticacao\Perfil;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class PerfilRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new PerfilRepository(new Adapter($config['db']), new PerfilHydrator(), new Perfil());
    }
}
