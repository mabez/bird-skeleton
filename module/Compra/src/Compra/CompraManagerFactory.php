<?php
namespace Compra;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CompraManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new CompraManager(
            $serviceLocator->get('CompraRepository'),
            $serviceLocator->get('CompraStatusManager'),
            $serviceLocator->get('ProdutoManager'),
            $serviceLocator->get('AutenticacaoManager')
        );
    }
}
