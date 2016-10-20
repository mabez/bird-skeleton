<?php
namespace Login;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Acesso\AcessoViewModelFactory;

class LoginViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new LoginViewModel(
            $this->getAcesso($serviceLocator),
            new AuthenticationService(),
            $serviceLocator->get('AutenticacaoManager'),
            new LoginForm()
        );
    }
}
