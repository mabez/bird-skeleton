<?php
namespace Application\Produto;

use Produto\ProdutoManager;
use \Iterator;
use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de produtos
 */
class ProdutosViewModel extends ViewModel
{
    /**
     * Injeta dependências
     * @param \Produto\ProdutoManager $produtoManager
     */
    public function __construct(ProdutoManager $produtoManager)
    {
        $this->generateVariablesByProdutosIterator(
            $produtoManager->obterTodos()
        );
    }

    /**
     * Converte um iterador de anúncios no formato para imprimir na tela
     * @param Iterator $iterator iterador
     * @param int $quantidadeColunas (default 3)
     */
    private function generateVariablesByProdutosIterator(Iterator $iterator, $quantidadeColunas = 3)
    {
        $retorno = array();
        $coluna = 1;
        foreach ($iterator as $produto) {
            $retorno['coluna'.$coluna][] = $produto->toArray();
            $coluna++;
            if ($coluna > $quantidadeColunas) {
                $coluna = 1;
            }
        }
        $this->variables['produtos'] = $retorno;
    }
}