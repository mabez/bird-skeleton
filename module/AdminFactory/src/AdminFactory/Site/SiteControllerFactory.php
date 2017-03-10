<?php
namespace AdminFactory\Site;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Site\SiteController;

class SiteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
            return new SiteController(
            $container->get('AdminSiteViewModel')
        );
    }
}
