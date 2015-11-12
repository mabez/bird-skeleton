<?php
namespace Acesso;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class AcessoViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $zendConfig = $serviceLocator->getServiceLocator()->get('config');
        return new AcessoViewHelper(new Acesso(new AuthenticationService(), $zendConfig['roles_resources']));
    }
}
