<?php
namespace Login\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Login\Model\PaginaLogin;

class PaginaLoginModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PaginaLogin($serviceLocator->get('Login'));
    }
}
