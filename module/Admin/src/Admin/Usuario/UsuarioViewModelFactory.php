<?php
namespace Admin\Usuario;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class UsuarioViewModelFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UsuarioViewModel(
            $serviceLocator->get('SiteManager'),
            new AuthenticationService(),
            $serviceLocator->get('Request')->getUri(),
            $serviceLocator->get('AutenticacaoManager')
        );
    }
}
