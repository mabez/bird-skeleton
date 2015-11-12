<?php
namespace Admin\Anuncio;

use Admin\AdminViewModel;
use Anuncio\AnuncioManager;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class AnunciosViewModel extends AdminViewModel
{

    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param \Anuncio\AnuncioManager $anuncioManager
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, AnuncioManager $anuncioManager)
    {
        parent::__construct($siteManager, $authentication, $uri);
        $this->variables['pagina'] = array('descricao' => 'Gerenciamento de anúncios.');
        $this->variables['anuncios'] = $anuncioManager->obterTodos();
    }
}
