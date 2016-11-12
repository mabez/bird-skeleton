<?php
namespace Login\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;

class IdentificacaoIdViewHelperFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoIdViewHelper(new AuthenticationService());
    }
}
