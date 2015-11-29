<?php

namespace Admin\Compra;

use Acesso\AcessoController;

class CompraController extends AcessoController
{
    protected $resource = 'admin-compra';
    
    /**
     * Mostra a página de administração de compras
     * @return AdminCompraViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('admin/compra/index');
    }
    
    /**
     * Obtem a model da pagina de administração de compras
     * @return AdminCompraViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('AdminCompraViewModel');
    }
}
