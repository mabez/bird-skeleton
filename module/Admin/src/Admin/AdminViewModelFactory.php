<?php
namespace Admin;

use Zend\ServiceManager\ServiceLocatorInterface;
use AcessoFactory\AcessoViewModelFactory;

class AdminViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new AdminViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('config')['admin_routes']
        );
    }
}
