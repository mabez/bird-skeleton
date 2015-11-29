<?php
namespace Admin\Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModificarProdutoViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ModificarProdutoViewModel(
            $serviceLocator->get('ProdutoManager'),
            new ProdutoForm(),
            $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
