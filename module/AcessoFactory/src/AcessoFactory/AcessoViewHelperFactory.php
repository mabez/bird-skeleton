<?php
namespace AcessoFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Acesso\AcessoViewHelper;
use Acesso\Acesso;
use Interop\Container\ContainerInterface;

class AcessoViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $zendConfig = $serviceLocator->getServiceLocator()->get('config');
        return new AcessoViewHelper(new Acesso(new AuthenticationService(), $zendConfig['roles_resources']));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}


