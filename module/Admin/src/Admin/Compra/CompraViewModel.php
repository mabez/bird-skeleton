<?php
namespace Admin\Compra;

use Admin\AdminViewModel;
use Compra\CompraManager;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página de administração de compras
 */
class CompraViewModel extends AdminViewModel
{

    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param \Compra\CompraManager $compraManager
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, CompraManager $compraManager)
    {
        parent::__construct($siteManager, $authentication, $uri);
        $this->variables['pagina'] = array('descricao' => 'Relatório de compras.');
        $this->variables['compras'] = $compraManager->obterTodasCompras();
    }
}
