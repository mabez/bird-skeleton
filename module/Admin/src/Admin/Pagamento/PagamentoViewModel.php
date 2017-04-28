<?php
namespace Admin\Pagamento;

use Ecompassaro\Pagamento\Manager as PagamentoManager;
use Ecompassaro\Acesso\ViewModel as AcessoViewModel;
use Ecompassaro\Acesso\Acesso;

/**
 * Gerador da estrutura da página de administração de pagamentos
 */
class PagamentoViewModel extends AcessoViewModel
{
    /**
     * Injeta dependências
     * @param \Acesso\Acesso
     * @param \Pagamento\PagamentoManager $pagamentoManager
     */
    public function __construct(Acesso $acesso, PagamentoManager $pagamentoManager)
    {
        parent::__construct($acesso);
        $this->variables['pagina'] = array('descricao' => 'Relatório de pagamentos.');
        $this->variables['pagamentos'] = $pagamentoManager->obterTodosPagamentos();
        $this->variables['total'] = $pagamentoManager->obterValorTotalPagamentos();
    }
}
