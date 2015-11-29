<?php
namespace Admin\Produto;

use Produto\ProdutoManager;
use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de administração de informações do produto
 */
class ProdutosViewModel extends ViewModel
{

    /**
     * Injeta dependências
     * @param \Produto\ProdutoManager $produtoManager
     */
    public function __construct(ProdutoManager $produtoManager)
    {
        $this->variables['pagina'] = array('descricao' => 'Gerenciamento de produtos.');
        $this->variables['produtos'] = $produtoManager->obterTodos();
    }
}
