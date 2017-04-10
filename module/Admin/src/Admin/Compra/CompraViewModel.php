<?php
namespace Admin\Compra;

use Ecompassaro\Compra\Manager as CompraManager;
use Acesso\AcessoViewModel;
use Acesso\Acesso;

/**
 * Gerador da estrutura da página de administração de compras
 */
class CompraViewModel extends AcessoViewModel
{
    /**
     * Injeta dependências
     * @param \Acesso\Acesso
     * @param \Compra\CompraManager $compraManager
     */
    public function __construct(Acesso $acesso, CompraManager $compraManager)
    {
        parent::__construct($acesso);
        $this->variables['pagina'] = array('descricao' => 'Relatório de compras.');
        $this->variables['compras'] = $compraManager->obterTodasCompras();
    }
}
