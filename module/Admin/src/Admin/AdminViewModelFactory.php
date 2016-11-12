<?php
namespace Admin;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class AdminViewModelFactory extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AdminViewModel(
            $this->getAcesso($container),
            $container->get('config')['admin_routes']
        );
    }
}
