<?php
namespace Autenticacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AutenticacaoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AutenticacaoManager(
            $serviceLocator->get('AutenticacaoRepository'),
            $serviceLocator->get('AutenticacaoAdapter'),
            $serviceLocator->get('PerfilManager')
        );
    }
}
