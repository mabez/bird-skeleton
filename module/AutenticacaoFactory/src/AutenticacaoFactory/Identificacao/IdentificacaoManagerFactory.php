<?php
namespace AutenticacaoFactory\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Autenticacao\Identificacao\IdentificacaoManager;

class IdentificacaoManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoManager(
            $container->get('IdentificacaoRepository')
        );
    }
}
