<?php
namespace Autenticacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AutenticacaoAdapterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AutenticacaoAdapter(
            $serviceLocator->get('AutenticacaoRepository'),
            $serviceLocator->get('IdentificacaoGenerator'),
            $serviceLocator->get('PerfilManager')
        );
    }
}
