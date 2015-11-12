<?php
namespace Autenticacao\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IdentificacaoGeneratorFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoGenerator($serviceLocator->get('IdentificacaoManager'));
    }
}
