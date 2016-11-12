<?php
namespace Autenticacao\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class IdentificacaoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoManager(
            $serviceLocator->get('IdentificacaoRepository')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
