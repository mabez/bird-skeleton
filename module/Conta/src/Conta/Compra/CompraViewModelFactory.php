<?php
namespace Conta\Compra;

use Zend\Authentication\AuthenticationService;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class CompraViewModelFactory extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CompraViewModel(
            $this->getAcesso($container),
            new AuthenticationService(),
            $container->get('CompraManager')
        );
    }
}
