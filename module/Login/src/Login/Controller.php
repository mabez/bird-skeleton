<?php
namespace BirdSkeleton\Login;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Login\Controller as LoginController;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LoginController($container->get('LoginViewModel'));
    }
}
