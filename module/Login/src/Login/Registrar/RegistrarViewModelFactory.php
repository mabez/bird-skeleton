<?php
namespace Login\Registrar;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class RegistrarViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistrarViewModel(
            $serviceLocator->get('SiteManager'),
            new AuthenticationService(),
            $serviceLocator->get('Request')->getUri(),
            $serviceLocator->get('AutenticacaoManager'),
            new RegistrarForm()
        );
    }
}
