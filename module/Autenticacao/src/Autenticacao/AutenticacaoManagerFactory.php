<?php
namespace Autenticacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class AutenticacaoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AutenticacaoManager(
            $serviceLocator->get('AutenticacaoRepository'),
            $serviceLocator->get('AutenticacaoAdapter'),
            $serviceLocator->get('PerfilManager')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
