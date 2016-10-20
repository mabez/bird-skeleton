<?php
namespace Acesso;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class AcessoViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AcessoViewModel($this->getAcesso($serviceLocator));
    }

    protected function getAcesso(ServiceLocatorInterface $serviceLocator)
    {
        $zendConfig = $serviceLocator->get('config');
        return new Acesso(new AuthenticationService(), $zendConfig['roles_resources']);
    }
}
