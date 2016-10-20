<?php
namespace Application\Produto;

use Zend\ServiceManager\ServiceLocatorInterface;
use Acesso\AcessoViewModelFactory;

class ProdutosViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutosViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('ProdutoManager')
        );
    }
}
