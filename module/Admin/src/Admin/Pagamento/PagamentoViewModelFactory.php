<?php
namespace Admin\Pagamento;

use Zend\ServiceManager\ServiceLocatorInterface;
use Acesso\AcessoViewModelFactory;

class PagamentoViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PagamentoViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('PagamentoManager')
        );
    }
}
