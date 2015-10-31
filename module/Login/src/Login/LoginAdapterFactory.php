<?php
namespace Login;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginAdapterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new LoginAdapter(
            $serviceLocator->get('LoginManager'),
            $serviceLocator->get('IdentificacaoGenerator')
        );
    }
}
