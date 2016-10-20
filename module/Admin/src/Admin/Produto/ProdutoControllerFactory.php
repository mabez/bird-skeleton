<?php
namespace Admin\Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProdutoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutoController(
            $serviceLocator->getServiceLocator()->get('AdminProdutosViewModel'),
            $serviceLocator->getServiceLocator()->get('AdminModificarProdutoViewModel')
        );
    }
}
