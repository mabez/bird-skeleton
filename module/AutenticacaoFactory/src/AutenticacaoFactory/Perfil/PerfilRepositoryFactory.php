<?php
namespace AutenticacaoFactory\Perfil;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Autenticacao\Perfil\PerfilRepository;
use Autenticacao\Perfil\PerfilHydrator;
use Autenticacao\Perfil\Perfil;

class PerfilRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new PerfilRepository(new Adapter($config['db']), new PerfilHydrator(), new Perfil());
    }
}
