<?php
namespace BirdSkeleton\Autenticacao\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Autenticacao\Identificacao\Generator as IdentificacaoGenerator;

class Generator implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoGenerator($container->get('IdentificacaoManager'));
    }
}
