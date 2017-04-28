<?php
namespace Pagamento;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Pagamento\Manager as PagamentoManager;

class Manager implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PagamentoManager(
            $container->get('PagamentoRepository'),
            $container->get('AutenticacaoManager')
        );
    }
}
