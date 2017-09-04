<?php
namespace BirdSkeleton\Autenticacao\Perfil;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Autenticacao\Perfil\Manager as PerfilManager;

class Manager implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PerfilManager(
            $container->get('PerfilRepository')
        );
    }
}
