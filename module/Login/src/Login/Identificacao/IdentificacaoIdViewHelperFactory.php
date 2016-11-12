<?php
namespace Login\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;

class IdentificacaoIdViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoIdViewHelper(new AuthenticationService());
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
