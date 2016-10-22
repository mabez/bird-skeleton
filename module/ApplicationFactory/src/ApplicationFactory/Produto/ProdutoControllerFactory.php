<?php
namespace ApplicationFactory\Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Produto\ProdutoController;

class ProdutoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutoController($serviceLocator->getServiceLocator()->get('ProdutosViewModel'));
    }
}
