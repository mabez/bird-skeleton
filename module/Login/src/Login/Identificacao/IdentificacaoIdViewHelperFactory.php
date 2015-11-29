<?php
namespace Login\Identificacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class IdentificacaoIdViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new IdentificacaoIdViewHelper(new AuthenticationService());
    }
}
