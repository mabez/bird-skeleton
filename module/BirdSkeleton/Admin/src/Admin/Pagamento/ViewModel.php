<?php
namespace BirdSkeleton\Admin\Pagamento;

use Ecompassaro\Acesso\Factory\ViewModel as AcessoViewModelFactory;
use Interop\Container\ContainerInterface;
use Ecompassaro\Admin\Pagamento\ViewModel as PagamentoViewModel;

class ViewModel extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PagamentoViewModel(
            $this->getAcesso($container),
            $container->get('PagamentoManager')
        );
    }
}
