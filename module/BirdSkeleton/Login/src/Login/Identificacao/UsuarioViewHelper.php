<?php
namespace BirdSkeleton\Login\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;
use Ecompassaro\Login\Identificacao\UsuarioViewHelper as IdentificacaoUsuarioViewHelper;

class UsuarioViewHelper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoUsuarioViewHelper(new AuthenticationService());
    }
}
