<?php
namespace Login\Registrar;

use Zend\ServiceManager\ServiceLocatorInterface;
use Acesso\AcessoViewModelFactory;

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
