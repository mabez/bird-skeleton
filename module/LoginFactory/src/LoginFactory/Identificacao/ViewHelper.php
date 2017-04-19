<?php
namespace LoginFactory\Identificacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;
use Ecompassaro\Login\Identificacao\ViewHelper as IdentificadoViewHelper;

class ViewHelper implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IdentificadoViewHelper(new AuthenticationService());
    }
}
