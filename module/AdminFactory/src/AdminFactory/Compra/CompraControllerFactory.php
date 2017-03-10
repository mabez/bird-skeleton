<?php
namespace AdminFactory\Compra;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Compra\CompraController;

class CompraControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CompraController(
            $container->get('AdminCompraViewModel')
        );
    }
}
