<?php
namespace Consumidor\Paypal;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Paypal\ExpressCheckout\ExpressCheckout;

class ExpressCheckoutFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ExpressCheckout($serviceLocator->get('config')['paypal']);
    }
}
