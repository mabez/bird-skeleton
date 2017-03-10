<?php
namespace AdminFactory\Pagamento;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Pagamento\PagamentoController;

class PagamentoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PagamentoController(
            $container->get('AdminPagamentoViewModel')
        );
    }

}
