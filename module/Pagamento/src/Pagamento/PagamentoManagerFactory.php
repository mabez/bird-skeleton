<?php
namespace Pagamento;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PagamentoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PagamentoManager(
            $serviceLocator->get('PagamentoRepository'),
            $serviceLocator->get('AutenticacaoManager')
        );
    }

}
