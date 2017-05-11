<?php
namespace ApplicationFactory\Site;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Session\Container;
use Ecompassaro\Application\Site\DefaultViewHelper as SiteDefaultViewHelper;
use Interop\Container\ContainerInterface;

class DefaultViewHelper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SiteDefaultViewHelper(
            $container->get('SiteManager'),
            new Container('Site')
        );
    }
}
