<?php
namespace Application\Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProdutosViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutosViewModel(
            $serviceLocator->get('ProdutoManager')
        );
    }
}
