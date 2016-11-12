<?php
namespace Login\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;

class IdentificadoViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificadoViewHelper(new AuthenticationService());
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
