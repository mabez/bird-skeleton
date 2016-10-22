<?php
namespace Login\Registrar;

use Zend\ServiceManager\ServiceLocatorInterface;
use AcessoFactory\AcessoViewModelFactory;

class RegistrarViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistrarViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('AutenticacaoManager'),
            new RegistrarForm()
        );
    }
}
