<?php
namespace Admin\Pagamento;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PagamentoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PagamentoController(
            $serviceLocator->getServiceLocator()->get('AdminPagamentoViewModel')
        );
    }
}
