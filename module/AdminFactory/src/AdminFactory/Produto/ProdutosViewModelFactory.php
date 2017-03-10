<?php
namespace AdminFactory\Produto;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Admin\Produto\ProdutosViewModel;

class ProdutosViewModelFactory extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ProdutosViewModel(
            $this->getAcesso($container),
            $container->get('ProdutoManager')
        );
    }
}
