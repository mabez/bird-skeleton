<?php
namespace ApplicationFactory\Site;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Session\Container;
use Application\Site\SiteDefaultViewHelper;
use Interop\Container\ContainerInterface;

class SiteDefaultViewHelperFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SiteDefaultViewHelper(
            $container->get('SiteManager'),
            new Container('Site')
        );
    }
}
