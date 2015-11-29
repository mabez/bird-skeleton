<?php
namespace Login;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class LoginViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new LoginViewModel(
            new AuthenticationService(),
            $serviceLocator->get('AutenticacaoManager'),
            new LoginForm()
        );
    }
}
