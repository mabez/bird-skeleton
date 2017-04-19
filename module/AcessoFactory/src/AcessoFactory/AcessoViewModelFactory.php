<?php
namespace AcessoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Ecompassaro\Acesso\Acesso;
use Ecompassaro\Acesso\ViewModel as AcessoViewModel;
use Interop\Container\ContainerInterface;

class AcessoViewModelFactory implements FactoryInterface
{
    protected function getAcesso(ContainerInterface $container)
    {
        $zendConfig = $container->get('config');
        return new Acesso(new AuthenticationService(), $zendConfig['roles_resources']);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AcessoViewModel($this->getAcesso($container));
    }
}
