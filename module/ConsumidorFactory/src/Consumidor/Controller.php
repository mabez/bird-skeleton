<?php
namespace ConsumidorFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Consumidor\Controller as ConsumidorController;

class Controller implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $callbackIdentificacaoId = $container->get("ViewHelperManager")->get('identificacaoId');
        return new ConsumidorController($container->get('ConsumidorViewModel'), $container->get('ConsumidorCompraViewModel'), $callbackIdentificacaoId());
    }
}
