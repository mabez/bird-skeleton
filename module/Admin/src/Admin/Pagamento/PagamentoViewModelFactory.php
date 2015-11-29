<?php
namespace Admin\Pagamento;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PagamentoViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PagamentoViewModel(
            $serviceLocator->get('PagamentoManager')
        );
    }
}
