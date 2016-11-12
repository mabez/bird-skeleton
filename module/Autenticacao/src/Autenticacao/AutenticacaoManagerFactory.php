<?php
namespace Autenticacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class AutenticacaoManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AutenticacaoManager(
            $container->get('AutenticacaoRepository'),
            $container->get('AutenticacaoAdapter'),
            $container->get('PerfilManager')
        );
    }
}
