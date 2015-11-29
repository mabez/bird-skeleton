<?php
namespace Conta\Compra;

use Compra\CompraManager;
use Zend\Authentication\AuthenticationService;
use Conta\ContaViewModel;

/**
 * Gerador da estrutura da página de administração de compras
 */
class CompraViewModel extends ContaViewModel
{

    /**
     * Injeta dependências
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Compra\CompraManager $compraManager
     */
    public function __construct(AuthenticationService $authentication, CompraManager $compraManager)
    {
        parent::__construct();
        $this->setDescricaoPagina('Veja todas as suas compras.');
        $this->variables['compras'] = $compraManager->obterTodasComprasAutenticacao($authentication->getIdentity()->getId());
    }
}
