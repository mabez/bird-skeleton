<?php
namespace AcessoFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Acesso\AcessoController;

class AcessoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AcessoController($serviceLocator->getServiceLocator()->get('AcessoViewModel'));
    }
}
