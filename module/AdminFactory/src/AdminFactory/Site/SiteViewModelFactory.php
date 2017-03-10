<?php
namespace AdminFactory\Site;

use Zend\Session\Container;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Admin\Site\SiteViewModel;
use Admin\Site\SiteForm;

class SiteViewModelFactory extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SiteViewModel(
            $this->getAcesso($container),
            $container->get('SiteManager'),
            new SiteForm($container->get('config')['image_directory']),
            new Container('Site')
        );
    }
}
