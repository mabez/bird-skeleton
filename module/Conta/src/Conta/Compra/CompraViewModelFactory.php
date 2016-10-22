<?php
namespace Conta\Compra;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use AcessoFactory\AcessoViewModelFactory;

class CompraViewModelFactory extends AcessoViewModelFactory
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CompraViewModel(
            $this->getAcesso($serviceLocator),
            new AuthenticationService(),
            $serviceLocator->get('CompraManager')
        );
    }
}
