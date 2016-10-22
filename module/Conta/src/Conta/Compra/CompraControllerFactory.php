<?php
namespace Conta\Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CompraControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new CompraController($serviceLocator->getServiceLocator()->get('ContaCompraViewModel'));
    }
}
