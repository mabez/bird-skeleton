<?php
namespace Login\Registrar;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class RegistrarViewModelFactory extends AcessoViewModelFactory
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RegistrarViewModel($this->getAcesso($container), $container->get('AutenticacaoManager'), new RegistrarForm());
    }
}
