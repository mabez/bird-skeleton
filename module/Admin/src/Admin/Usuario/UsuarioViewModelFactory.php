<?php
namespace Admin\Usuario;

use Zend\ServiceManager\ServiceLocatorInterface;
use AcessoFactory\AcessoViewModelFactory;

class UsuarioViewModelFactory extends AcessoViewModelFactory
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UsuarioViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('AutenticacaoManager')
        );
    }
}
