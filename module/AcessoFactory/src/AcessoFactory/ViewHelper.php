<?php
namespace AcessoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Ecompassaro\Acesso\ViewHelper as AcessoViewHelper;
use Ecompassaro\Acesso\Acesso;
use Interop\Container\ContainerInterface;

class ViewHelper implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $zendConfig = $container->get('config');
        return new AcessoViewHelper(new Acesso(new AuthenticationService(), $zendConfig['roles_resources']));
    }
}
