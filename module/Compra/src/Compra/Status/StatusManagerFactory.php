<?php
namespace Compra\Status;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class StatusManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new StatusManager(
            $container->get('CompraStatusRepository')
        );
    }
}
