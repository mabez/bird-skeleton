<?php
namespace AdminFactory\Usuario;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Usuario\ModificarViewModel as ModificarUsuarioViewModel;
use Ecompassaro\Admin\Usuario\Form as UsuarioForm;

class ModificarViewModel implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
            return new ModificarUsuarioViewModel(
            $container->get('AutenticacaoManager'),
            new UsuarioForm(),
            $container->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
