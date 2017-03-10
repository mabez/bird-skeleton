<?php
namespace AdminFactory\Usuario;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Usuario\ModificarUsuarioViewModel;
use Admin\Usuario\UsuarioForm;

class ModificarUsuarioViewModelFactory implements FactoryInterface
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
