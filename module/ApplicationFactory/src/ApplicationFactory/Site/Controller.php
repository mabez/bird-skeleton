<?php
namespace ApplicationFactory\Site;

use Zend\ServiceManager\Factory\FactoryInterface;
use Ecompassaro\Application\Site\Controller as SiteController;
use Interop\Container\ContainerInterface;

class Controller implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SiteController($container->get('AcessoViewModel'));
    }
}
