<?php
namespace ValorTotalCompra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ValorTotalCompraViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ValorTotalCompraViewHelper($serviceLocator->getServiceLocator()->get('CompraManager'));
    }
}
