<?php
namespace Application\Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProdutoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutoController($serviceLocator->getServiceLocator()->get('ProdutosViewModel'));
    }
}
