<?php
namespace Consumidor\Paypal;

use Zend\ServiceManager\Factory\FactoryInterface;
use Ecompassaro\Paypal\ExpressCheckout\ExpressCheckout;
use Interop\Container\ContainerInterface;

class ExpressCheckoutFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ExpressCheckout($container->get('config')['paypal']);
    }
}
