<?php
namespace Pagamento;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class PagamentoManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PagamentoManager(
            $serviceLocator->get('PagamentoRepository'),
            $serviceLocator->get('AutenticacaoManager')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }

}
