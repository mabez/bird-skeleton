<?php
namespace Autenticacao\Perfil;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PerfilManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PerfilManager(
            $serviceLocator->get('PerfilRepository')
        );
    }
}
