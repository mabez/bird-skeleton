<?php
namespace Admin;

use Application\Site\SiteViewModel;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página de admin do site
 */
class AdminViewModel extends SiteViewModel
{
    protected $mensagens = array();
    
    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteService
     * @param \Zend\Authentication\AuthenticationService $autenticacao
     * @param \Zend\Uri\Uri $uri
     * @param mixed $entidadesConfig
     */
    public function __construct(SiteManager $siteService, AuthenticationService $autenticacao, Uri $uri, $entidadesConfig = array())
    {
        parent::__construct($siteService, $autenticacao, $uri);
        $this->variables['entidades'] = $entidadesConfig;
        $this->variables['pagina'] = array('descricao' => 'Selecione o que você quer gerenciar no menu abaixo.');
    }
}
