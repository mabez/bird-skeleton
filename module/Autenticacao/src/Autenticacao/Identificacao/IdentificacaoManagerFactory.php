<?php
namespace Autenticacao\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IdentificacaoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoManager(
            $serviceLocator->get('IdentificacaoRepository')
        );
    }
}
