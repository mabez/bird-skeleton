<?php
namespace AutenticacaoFactory\Perfil;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Autenticacao\Perfil\PerfilManager;

class PerfilManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PerfilManager(
            $container->get('PerfilRepository')
        );
    }
}
