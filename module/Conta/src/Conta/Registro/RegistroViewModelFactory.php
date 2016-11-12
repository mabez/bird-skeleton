<?php
namespace Conta\Registro;

use Zend\Authentication\AuthenticationService;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class RegistroViewModelFactory extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RegistroViewModel(
            $this->getAcesso($container),
            new AuthenticationService(),
            $container->get('AutenticacaoManager'),
            new RegistroForm(),
            $container->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
