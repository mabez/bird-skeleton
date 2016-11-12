<?php
namespace Consumidor;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class ConsumidorControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $callbackIdentificacaoId = $serviceLocator->getServiceLocator()->get("ViewHelperManager")->get('identificacaoId');
        return new ConsumidorController(
            $serviceLocator->getServiceLocator()->get('ConsumidorViewModel'),
            $serviceLocator->getServiceLocator()->get('ConsumidorCompraViewModel'),
            $callbackIdentificacaoId()
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
