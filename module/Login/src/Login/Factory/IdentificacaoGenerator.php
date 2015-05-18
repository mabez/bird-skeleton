<?php
namespace Login\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Login\Model\IdentificacaoGenerator as Instance;

class IdentificacaoGenerator implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new Instance($serviceLocator->get('Identificacao'));
    }
}
