<?php
namespace AdminFactory\Compra;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Admin\Compra\CompraViewModel;

class CompraViewModelFactory extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CompraViewModel(
            $this->getAcesso($container),
            $container->get('CompraManager')
        );
    }
}
