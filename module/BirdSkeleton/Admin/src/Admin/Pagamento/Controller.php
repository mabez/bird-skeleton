<?php
namespace BirdSkeleton\Admin\Pagamento;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Pagamento\Controller as PagamentoController;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PagamentoController(
            $container->get('AdminPagamentoViewModel')
        );
    }

}
