<?php
namespace ValorTotalCompra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class ValorTotalCompraViewHelperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ValorTotalCompraViewHelper($serviceLocator->getServiceLocator()->get('CompraManager'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
