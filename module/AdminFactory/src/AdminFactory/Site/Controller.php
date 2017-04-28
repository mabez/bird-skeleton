<?php
namespace AdminFactory\Site;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Site\Controller as SiteController;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
            return new SiteController(
            $container->get('AdminSiteViewModel')
        );
    }
}
