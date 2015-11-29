<?php
namespace Conta\Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;

class CompraViewModelFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CompraViewModel(
            new AuthenticationService(),
            $serviceLocator->get('CompraManager')
        );
    }
}
