<?php
namespace Admin\Usuario;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class ModificarUsuarioViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ModificarUsuarioViewModel(
            $serviceLocator->get('SiteManager'),
            new AuthenticationService(),
            $serviceLocator->get('Request')->getUri(),
            $serviceLocator->get('AutenticacaoManager'),
            new UsuarioForm(),
            $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
