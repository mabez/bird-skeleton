<?php
namespace AdminFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Controller as AdminController;

class Controller implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AdminController($container->get('AdminViewModel'));
    }
}
