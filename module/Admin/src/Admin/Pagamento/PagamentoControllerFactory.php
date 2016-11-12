<?php
namespace Admin\Pagamento;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class PagamentoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PagamentoController(
            $container->get('AdminPagamentoViewModel')
        );
    }

}
