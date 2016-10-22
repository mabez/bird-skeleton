<?php
namespace Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProdutoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutoManager($serviceLocator->get('ProdutoRepository'));
    }
}
