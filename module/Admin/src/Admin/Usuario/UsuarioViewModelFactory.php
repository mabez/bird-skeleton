<?php
namespace Admin\Usuario;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UsuarioViewModelFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UsuarioViewModel(
            $serviceLocator->get('AutenticacaoManager')
        );
    }
}
