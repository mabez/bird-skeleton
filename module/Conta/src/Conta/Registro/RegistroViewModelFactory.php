<?php
namespace Conta\Registro;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class RegistroViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistroViewModel(
            $serviceLocator->get('SiteManager'),
            new AuthenticationService(),
            $serviceLocator->get('Request')->getUri(),
            $serviceLocator->get('AutenticacaoManager'),
            new RegistroForm(),
            $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
