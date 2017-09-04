<?php
namespace BirdSkeleton\Admin\Produto;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Produto\ModificarViewModel as ModificarProdutoViewModel;
use Ecompassaro\Admin\Produto\Form as ProdutoForm;

class ModificarViewModel implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ModificarProdutoViewModel(
            $container->get('ProdutoManager'),
            new ProdutoForm($container->get('config')['image_directory']),
            $container->get('Application')->getMvcEvent()->getRouteMatch()->getParams()
        );
    }

}
