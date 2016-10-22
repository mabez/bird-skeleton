<?php
namespace Admin\Produto;

use Zend\ServiceManager\ServiceLocatorInterface;
use AcessoFactory\AcessoViewModelFactory;

class ProdutosViewModelFactory extends AcessoViewModelFactory
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ProdutosViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('ProdutoManager')
        );
    }
}
