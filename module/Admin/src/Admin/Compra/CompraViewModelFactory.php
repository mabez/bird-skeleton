<?php
namespace Admin\Compra;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

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
