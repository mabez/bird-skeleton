<?php
namespace AdminFactory\Usuario;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Usuario\Controller as UsuarioController;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
            return new UsuarioController(
            $container->get('AdminUsuarioViewModel'),
            $container->get('AdminModificarUsuarioViewModel')
        );
    }

}
