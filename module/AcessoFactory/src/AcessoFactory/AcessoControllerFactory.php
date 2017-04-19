<?php
namespace AcessoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Ecompassaro\Acesso\Controller as AcessoController;
use Interop\Container\ContainerInterface;

class AcessoControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $acessoConfig = $container->get('config')['acesso'];
        return new AcessoController($container->get('AcessoViewModel'), $acessoConfig['resource'], $acessoConfig['route']);
    }
}
