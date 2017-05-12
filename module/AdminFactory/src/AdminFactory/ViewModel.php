<?php
namespace AdminFactory;

use Ecompassaro\Acesso\Factory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\ViewModel as AdminViewModel;

class ViewModel extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AdminViewModel(
            $this->getAcesso($container),
            $container->get('config')['admin_routes']
        );
    }
}
