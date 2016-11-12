<?php
namespace Admin\Pagamento;

use AcessoFactory\AcessoViewModelFactory;
use Interop\Container\ContainerInterface;

class PagamentoViewModelFactory extends AcessoViewModelFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PagamentoViewModel(
            $this->getAcesso($container),
            $container->get('PagamentoManager')
        );
    }
}
