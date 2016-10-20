<?php
namespace Admin\Produto;

use Produto\ProdutoManager;
use Acesso\AcessoViewModel;
use Acesso\Acesso;

/**
 * Gerador da estrutura da página de administração de informações do produto
 */
class ProdutosViewModel extends AcessoViewModel
{

    /**
     * Injeta dependências
     * @param \Acesso\Acesso
     * @param \Produto\ProdutoManager $produtoManager
     */
    public function __construct(Acesso $acesso, ProdutoManager $produtoManager)
    {
        parent::__construct($acesso);
        $this->variables['pagina'] = array('descricao' => 'Gerenciamento de produtos.');
        $this->variables['produtos'] = $produtoManager->obterTodos();
    }
}
