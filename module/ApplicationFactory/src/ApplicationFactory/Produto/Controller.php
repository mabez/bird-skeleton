<?php
namespace ApplicationFactory\Produto;

use Zend\ServiceManager\Factory\FactoryInterface;
use Ecompassaro\Application\Produto\Controller as ProdutoController;
use Interop\Container\ContainerInterface;

class Controller implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ProdutoController($container->get('ProdutosViewModel'));
    }
}
