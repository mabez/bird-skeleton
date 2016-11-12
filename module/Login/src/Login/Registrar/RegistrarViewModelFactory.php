<?php
namespace Login\Registrar;

use Zend\ServiceManager\ServiceLocatorInterface;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class RegistrarViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new RegistrarViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('AutenticacaoManager'),
            new RegistrarForm()
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
