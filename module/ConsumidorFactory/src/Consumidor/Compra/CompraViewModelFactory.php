<?php
namespace Consumidor\Compra;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Hydrator\ArraySerializable;
use Interop\Container\ContainerInterface;

class CompraViewModelFactory implements FactoryInterface
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
