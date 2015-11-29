<?php
namespace Conta\Registro;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class RegistroViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistroViewModel(
            new AuthenticationService(),
            $serviceLocator->get('AutenticacaoManager'),
            new RegistroForm(),
            $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
