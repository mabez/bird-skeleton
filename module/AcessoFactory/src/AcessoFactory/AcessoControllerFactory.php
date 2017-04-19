<?php
namespace AcessoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Ecompassaro\Acesso\Controller as AcessoController;
use Interop\Container\ContainerInterface;

class AcessoControllerFactory implements FactoryInterface
{

    const RESOURCE = 'acesso';

    const ROUTE_DEFAULT = 'site';

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AcessoController($container->get('AcessoViewModel'), self::RESOURCE, self::ROUTE_DEFAULT);
    }
}
