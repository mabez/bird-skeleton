<?php

namespace Admin\Compra;

use Application\Site\SiteController;

class CompraController extends SiteController
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
