<?php
namespace Conta\Compra;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

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

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
