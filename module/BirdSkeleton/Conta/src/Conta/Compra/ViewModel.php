<?php
namespace BirdSkeleton\Conta\Compra;

use Zend\Authentication\AuthenticationService;
use Ecompassaro\Acesso\Factory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Conta\Compra\ViewModel as CompraViewModel;

class ViewModel extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CompraViewModel(
            $this->getAcesso($container),
            new AuthenticationService(),
            $container->get('CompraManager')
        );
    }
}
