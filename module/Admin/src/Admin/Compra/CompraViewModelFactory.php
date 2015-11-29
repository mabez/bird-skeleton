<?php
namespace Admin\Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CompraViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CompraViewModel(
            $serviceLocator->get('CompraManager')
        );
    }
}
