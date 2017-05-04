<?php
namespace AdminFactory\Site;

use Zend\Session\Container;
use AcessoFactory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Site\ViewModel as SiteViewModel;
use Ecompassaro\Admin\Site\Form as SiteForm;

class ViewModel extends AcessoViewModelFactory
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
