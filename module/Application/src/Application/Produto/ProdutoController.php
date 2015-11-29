<?php

namespace Application\Produto;

use Admin\Site\SiteController;

class ProdutoController extends SiteController
{
    /**
     * Mostra a página de anúncios
     * @return ProdutosViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('produto/lista');
    }
    
    /**
     * Obtem a Model da página de anúncios
     * @return ProdutosViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('ProdutosViewModel');
    }
}
