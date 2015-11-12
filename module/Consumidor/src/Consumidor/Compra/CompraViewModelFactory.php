<?php
namespace Consumidor\Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class CompraViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new CompraViewModel(
            $serviceLocator->get('SiteManager'),
            new AuthenticationService(),
            $serviceLocator->get('Request')->getUri(),
            $serviceLocator->get('CompraManager'),
            new CompraForm()
        );
    }
}
