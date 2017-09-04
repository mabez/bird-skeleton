<?php
namespace BirdSkeleton\Autenticacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Autenticacao\Adapter as AutenticacaoAdapter;

class Adapter implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AutenticacaoAdapter(
            $container->get('AutenticacaoRepository'),
            $container->get('IdentificacaoGenerator'),
            $container->get('PerfilManager')
        );
    }
}
