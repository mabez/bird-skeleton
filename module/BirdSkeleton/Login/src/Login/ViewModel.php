<?php
namespace BirdSkeleton\Login;

use Zend\Authentication\AuthenticationService;
use Ecompassaro\Acesso\Factory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Login\ViewModel as LoginViewModel;
use Ecompassaro\Login\Form as LoginForm;

class ViewModel extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LoginViewModel(
            $this->getAcesso($container),
            new AuthenticationService(),
            $container->get('AutenticacaoManager'),
            new LoginForm()
        );
    }
}
