<?php
namespace Conta\Registro;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class RegistroControllerFactory implements FactoryInterface
{
   public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RegistroController($container->get('ContaRegistroViewModel'));
    }
}
