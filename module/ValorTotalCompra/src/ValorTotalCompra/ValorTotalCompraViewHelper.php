<?php
namespace ValorTotalCompra;

use Zend\View\Helper\AbstractHelper;
use Compra\CompraManager;
use Compra\Compra;

class ValorTotalCompraViewHelper extends AbstractHelper
{
    private $compraManager;

    /**
     * Retorna o usuario atual
     */
    public function __invoke(Compra $compra)
    {
        return $this->compraManager->caucularValorTotal($compra);
    }

    /**
     * Injeta dependências
     * @param \Compra\CompraManager $compraManager
     */
    public function __construct(CompraManager $compraManager)
    {
        $this->compraManager = $compraManager;
    }
}
