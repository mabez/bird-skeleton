<?php
namespace Autenticacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class AutenticacaoAdapterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AutenticacaoAdapter(
            $serviceLocator->get('AutenticacaoRepository'),
            $serviceLocator->get('IdentificacaoGenerator'),
            $serviceLocator->get('PerfilManager')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
