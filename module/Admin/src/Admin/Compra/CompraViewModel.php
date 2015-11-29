<?php
namespace Admin\Compra;

use Compra\CompraManager;
use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de administração de compras
 */
class CompraViewModel extends ViewModel
{
    /**
     * Injeta dependências
     * @param \Compra\CompraManager $compraManager
     */
    public function __construct(CompraManager $compraManager)
    {
        $this->variables['pagina'] = array('descricao' => 'Relatório de compras.');
        $this->variables['compras'] = $compraManager->obterTodasCompras();
    }
}
