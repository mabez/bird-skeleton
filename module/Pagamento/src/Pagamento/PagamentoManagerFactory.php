<?php
namespace Pagamento;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class PagamentoManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PagamentoManager(
            $container->get('PagamentoRepository'),
            $container->get('AutenticacaoManager')
        );
    }
}
