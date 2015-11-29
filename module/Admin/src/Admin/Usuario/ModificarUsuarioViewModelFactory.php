<?php
namespace Admin\Usuario;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModificarUsuarioViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ModificarUsuarioViewModel(
            $serviceLocator->get('AutenticacaoManager'),
            new UsuarioForm(),
            $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
