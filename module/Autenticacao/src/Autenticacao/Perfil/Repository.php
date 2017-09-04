<?php
namespace BirdSkeleton\Autenticacao\Perfil;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Ecompassaro\Autenticacao\Perfil\Repository as PerfilRepository;
use Ecompassaro\Autenticacao\Perfil\Hydrator as PerfilHydrator;
use Ecompassaro\Autenticacao\Perfil;

class Repository implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new PerfilRepository(new Adapter($config['db']), new PerfilHydrator(), new Perfil());
    }
}
