<?php
namespace Acesso;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AcessoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AcessoController($serviceLocator->getServiceLocator()->get('AcessoViewModel'));
    }
}
