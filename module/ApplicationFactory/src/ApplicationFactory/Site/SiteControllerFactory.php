<?php
namespace ApplicationFactory\Site;

use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Site\SiteController;
use Interop\Container\ContainerInterface;

class SiteControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SiteController($container->get('AcessoViewModel'));
    }
}
