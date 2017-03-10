<?php
namespace AdminFactory\Produto;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Produto\ProdutoController;

class ProdutoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
            return new ProdutoController(
            $container->get('AdminProdutosViewModel'),
            $container->get('AdminModificarProdutoViewModel')
        );
    }
}
