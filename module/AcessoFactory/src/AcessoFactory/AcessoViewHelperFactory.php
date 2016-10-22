<?php
namespace AcessoFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Acesso\AcessoViewHelper;
use Acesso\Acesso;

class AcessoViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $zendConfig = $serviceLocator->getServiceLocator()->get('config');
        return new AcessoViewHelper(new Acesso(new AuthenticationService(), $zendConfig['roles_resources']));
    }
}
