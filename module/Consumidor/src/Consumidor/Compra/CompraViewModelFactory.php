<?php
namespace Consumidor\Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ArraySerializable;

class CompraViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new CompraViewModel(
            $serviceLocator->get('CompraManager'),
            new CompraForm(),
            new ArraySerializable(),
            $serviceLocator->get('Application')->getMvcEvent()->getApplication()->getEventManager(),
            $serviceLocator->get('ConsumidorExpressCheckout'),
            $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
