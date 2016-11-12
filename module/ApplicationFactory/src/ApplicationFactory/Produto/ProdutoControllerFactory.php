<?php
namespace ApplicationFactory\Produto;

use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Produto\ProdutoController;
use Interop\Container\ContainerInterface;

class ProdutoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ProdutoController($container->get('ProdutosViewModel'));
    }
}
