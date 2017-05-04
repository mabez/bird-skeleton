<?php
namespace LoginFactory\Registrar;

use AcessoFactory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Login\Registrar\ViewModel as RegistrarViewModel;
use Ecompassaro\Login\Registrar\Form as RegistrarForm;

class ViewModel extends AcessoViewModelFactory
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RegistrarViewModel($this->getAcesso($container), $container->get('AutenticacaoManager'), new RegistrarForm());
    }
}
