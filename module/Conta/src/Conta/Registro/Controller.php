<?php
namespace BirdSkeleton\Conta\Registro;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Conta\Registro\Controller as RegistroController;

class Controller implements FactoryInterface
{
   public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RegistroController($container->get('ContaRegistroViewModel'));
    }
}
