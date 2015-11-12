<?php
namespace Conta;

use Application\Site\SiteViewModel;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página de admin do site
 */
class ContaViewModel extends SiteViewModel
{
    protected $mensagens = array();
    
    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteService
     * @param \Zend\Authentication\AuthenticationService $autenticacao
     * @param \Zend\Uri\Uri $uri
     */
    public function __construct(SiteManager $siteService, AuthenticationService $autenticacao, Uri $uri)
    {
        parent::__construct($siteService, $autenticacao, $uri);
        $this->setTituloPagina('Minha Conta');
    }

    protected function setTituloPagina($titulo) {
        $this->variables['pagina']['titulo'] = $titulo;
    }
    
    protected function setDescricaoPagina($descricao) {
        $this->variables['pagina']['descricao'] = $descricao;
    }
}
