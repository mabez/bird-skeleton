<?php
namespace Admin\Site;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;
use AcessoFactory\AcessoViewModelFactory;

class SiteViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new SiteViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('SiteManager'),
            new SiteForm($serviceLocator->get('config')['image_directory']),
            new Container('Site')
        );
    }
}
