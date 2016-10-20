<?php

namespace Admin\Pagamento;

use Acesso\AcessoController;

class PagamentoController extends AcessoController
{
    protected $resource = 'admin-pagamento';

    /**
     * Mostra a página de administração de pagamentos
     * @return AdminCompraViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('admin/pagamento/index');
    }
}
