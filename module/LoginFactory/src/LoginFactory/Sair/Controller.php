<?php
namespace LoginFactory\Sair;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SairController($container->get('LoginViewModel'));
    }
}
