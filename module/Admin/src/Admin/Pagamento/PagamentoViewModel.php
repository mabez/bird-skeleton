<?php
namespace Admin\Pagamento;

use Pagamento\PagamentoManager;
use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de administração de pagamentos
 */
class PagamentoViewModel extends ViewModel
{
    /**
     * Injeta dependências
     * @param \Pagamento\PagamentoManager $pagamentoManager
     */
    public function __construct(PagamentoManager $pagamentoManager)
    {
        $this->variables['pagina'] = array('descricao' => 'Relatório de pagamentos.');
        $this->variables['pagamentos'] = $pagamentoManager->obterTodosPagamentos();
        $this->variables['total'] = $pagamentoManager->obterValorTotalPagamentos();
    }
}
