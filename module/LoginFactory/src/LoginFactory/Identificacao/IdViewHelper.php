<?php
namespace LoginFactory\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;

class IdViewHelper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoIdViewHelper(new AuthenticationService());
    }
}
