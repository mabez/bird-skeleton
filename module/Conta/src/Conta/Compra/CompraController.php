<?php

namespace Conta\Compra;

use Acesso\AcessoController;

class CompraController extends AcessoController
{
    protected $resource = 'conta-compras';
    
    /**
     * Mostra a página de compras da conta
     * @return AdminCompraViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('conta/compra/index');
    }
    
    /**
     * Obtem a model da pagina de compras da conta
     * @return ContaCompraViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('ContaCompraViewModel');
    }
}
