<?php
namespace ApplicationFactory\Produto;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Produto\ProdutoController;
use Interop\Container\ContainerInterface;

class ProdutoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutoController($serviceLocator->getServiceLocator()->get('ProdutosViewModel'));
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
