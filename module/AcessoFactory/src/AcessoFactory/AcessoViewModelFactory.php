<?php
namespace AcessoFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Acesso\Acesso;
use Acesso\AcessoViewModel;

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
