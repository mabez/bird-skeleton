<?php
namespace AdminFactory\Usuario;

use AcessoFactory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Usuario\ViewModel as UsuarioViewModel;

class ViewModel extends AcessoViewModelFactory
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new UsuarioViewModel(
            $this->getAcesso($container),
            $container->get('AutenticacaoManager')
        );
    }
}
