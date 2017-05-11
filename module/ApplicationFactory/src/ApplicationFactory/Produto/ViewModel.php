<?php
namespace ApplicationFactory\Produto;

use Ecompassaro\Application\Produto\ViewModel as ProdutosViewModel;
use AcessoFactory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class ViewModel extends AcessoViewModelFactory
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ProdutosViewModel(
            $this->getAcesso($container),
            $container->get('ProdutoManager')
        );

    }
}
