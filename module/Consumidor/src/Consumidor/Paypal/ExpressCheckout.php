<?php

namespace BirdSkeleton\Consumidor\Paypal;

use Zend\ServiceManager\Factory\FactoryInterface;
use Ecompassaro\Paypal\ExpressCheckout\ExpressCheckout;
use Interop\Container\ContainerInterface;

class ExpressCheckout implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ExpressCheckout($container->get('config')['paypal']);
    }
}
