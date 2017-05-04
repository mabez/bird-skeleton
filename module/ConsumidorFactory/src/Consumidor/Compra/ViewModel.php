<?php
namespace ConsumidorFactory\Compra;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Hydrator\ArraySerializable;
use Interop\Container\ContainerInterface;
use Ecompassaro\Consumidor\Compra\ViewModel as CompraViewModel;
use Ecompassaro\Consumidor\Compra\Form as CompraForm;

class ViewModel implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
//        die('aqi');
        return new CompraViewModel(
            $container->get('CompraManager'),
            new CompraForm(),
            new ArraySerializable(),
            $container->get('Application')->getMvcEvent()->getApplication()->getEventManager(),
//            $container->get('ConsumidorExpressCheckout'),
            $container->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }
}
