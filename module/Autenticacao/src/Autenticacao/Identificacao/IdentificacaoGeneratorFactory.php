<?php
namespace Autenticacao\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class IdentificacaoGeneratorFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoGenerator($container->get('IdentificacaoManager'));
    }
}
