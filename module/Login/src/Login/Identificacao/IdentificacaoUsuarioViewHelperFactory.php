<?php
namespace Login\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class IdentificacaoUsuarioViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoUsuarioViewHelper(new AuthenticationService());
    }
}
