<?php
namespace BirdSkeleton\Admin\Compra;

use Ecompassaro\Acesso\Factory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Compra\ViewModel as CompraViewModel;

class ViewModel extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CompraViewModel(
            $this->getAcesso($container),
            $container->get('CompraManager')
        );
    }
}
