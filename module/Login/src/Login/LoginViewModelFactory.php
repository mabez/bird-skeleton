<?php
namespace Login;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

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

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
