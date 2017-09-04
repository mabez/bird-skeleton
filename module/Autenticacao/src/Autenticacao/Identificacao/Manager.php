<?php
namespace BirdSkeleton\Autenticacao\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Autenticacao\Identificacao\Manager as IdentificacaoManager;

class Manager implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoManager(
            $container->get('IdentificacaoRepository')
        );
    }
}
