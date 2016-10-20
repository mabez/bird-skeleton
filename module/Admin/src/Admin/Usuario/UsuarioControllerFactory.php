<?php
namespace Admin\Usuario;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UsuarioControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new UsuarioController(
            $serviceLocator->getServiceLocator()->get('AdminUsuarioViewModel'),
            $serviceLocator->getServiceLocator()->get('AdminModificarUsuarioViewModel')
        );
    }
}
