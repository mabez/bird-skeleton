<?php
namespace ApplicationFactory\Produto;

use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Produto\ProdutosViewModel;
use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class ProdutosViewModelFactory extends AcessoViewModelFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ProdutosViewModel(
            $this->getAcesso($serviceLocator),
            $serviceLocator->get('ProdutoManager')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
