<?php
namespace Conta\Compra;

use Compra\CompraManager;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;
use Conta\ContaViewModel;

/**
 * Gerador da estrutura da página de administração de compras
 */
class CompraViewModel extends ContaViewModel
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
        $this->setDescricaoPagina('Veja todas as suas compras.');
        $this->variables['compras'] = $compraManager->obterTodasComprasAutenticacao($authentication->getIdentity()->getId());
    }
}
