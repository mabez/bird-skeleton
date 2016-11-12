<?php
namespace Admin\Produto;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

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
