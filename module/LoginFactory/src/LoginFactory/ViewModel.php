<?php
namespace LoginFactory;

use Zend\Authentication\AuthenticationService;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

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
