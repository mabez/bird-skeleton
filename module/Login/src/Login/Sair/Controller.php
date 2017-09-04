<?php
namespace BirdSkeleton\Login\Sair;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Login\Sair\Controller as SairController;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SairController($container->get('LoginViewModel'));
    }
}
