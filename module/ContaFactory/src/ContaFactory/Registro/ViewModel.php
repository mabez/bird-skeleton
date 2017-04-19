<?php
namespace ContaFactory\Registro;

use Zend\Authentication\AuthenticationService;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Conta\Registro\ViewModel as RegistroViewModel;
use Ecompassaro\Conta\Registro\Form as RegistroForm;

class ViewModel extends AcessoViewModelFactory
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
