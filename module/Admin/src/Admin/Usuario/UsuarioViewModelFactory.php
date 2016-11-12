<?php
namespace Admin\Usuario;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class UsuarioViewModelFactory extends AcessoViewModelFactory
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new UsuarioViewModel(
            $this->getAcesso($container),
            $container->get('AutenticacaoManager')
        );
    }
}
