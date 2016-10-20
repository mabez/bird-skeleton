<?php
namespace Admin\Compra;

use Zend\ServiceManager\ServiceLocatorInterface;
use Acesso\AcessoViewModelFactory;

class CompraViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CompraViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('CompraManager')
        );
    }
}
