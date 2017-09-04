<?php
namespace BirdSkeleton\Login\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;
use Ecompassaro\Login\Identificacao\IdViewHelper as IdentificacaoIdViewHelper;

class IdViewHelper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoIdViewHelper(new AuthenticationService());
    }
}
