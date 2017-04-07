<?php
namespace AutenticacaoFactory\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Autenticacao\Identificacao\Repository as IdentificacaoRepository;

class IdentificacaoRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificacaoRepository();
    }
}
