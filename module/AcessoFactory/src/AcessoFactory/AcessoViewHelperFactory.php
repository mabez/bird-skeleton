<?php
namespace AcessoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Acesso\AcessoViewHelper;
use Acesso\Acesso;
use Interop\Container\ContainerInterface;

class AcessoViewHelperFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $zendConfig = $container->get('config');
        return new AcessoViewHelper(new Acesso(new AuthenticationService(), $zendConfig['roles_resources']));
    }
}
