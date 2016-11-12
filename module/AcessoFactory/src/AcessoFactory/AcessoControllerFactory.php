<?php
namespace AcessoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Acesso\AcessoController;
use Interop\Container\ContainerInterface;

class AcessoControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AcessoController($container->get('AcessoViewModel'));
    }
}
