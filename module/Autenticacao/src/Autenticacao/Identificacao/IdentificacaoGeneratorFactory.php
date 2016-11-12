<?php
namespace Autenticacao\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class IdentificacaoGeneratorFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoGenerator($serviceLocator->get('IdentificacaoManager'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
