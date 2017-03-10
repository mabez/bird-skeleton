<?php
namespace AdminFactory\Usuario;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Usuario\UsuarioController;

class UsuarioControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
            return new UsuarioController(
            $container->get('AdminUsuarioViewModel'),
            $container->get('AdminModificarUsuarioViewModel')
        );
    }

}
