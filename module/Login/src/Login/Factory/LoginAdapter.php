<?php
namespace Login\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Login\Adapter\Login as Instance;

class LoginAdapter implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new Instance($serviceLocator->get('Login'), $serviceLocator->get('IdentificacaoGenerator'));
    }
}
