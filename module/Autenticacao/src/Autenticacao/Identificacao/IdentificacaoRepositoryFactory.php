<?php
namespace Autenticacao\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class IdentificacaoRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoRepository();
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
