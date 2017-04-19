<?php
namespace LoginFactory\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;

class ViewHelper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificadoViewHelper(new AuthenticationService());
    }
}
