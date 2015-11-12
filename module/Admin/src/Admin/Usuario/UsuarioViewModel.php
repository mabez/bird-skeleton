<?php
namespace Admin\Usuario;

use Admin\AdminViewModel;
use Autenticacao\AutenticacaoManager;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class UsuarioViewModel extends AdminViewModel
{

    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, AutenticacaoManager $autenticacaoManager)
    {
        parent::__construct($siteManager, $authentication, $uri);
        $this->variables['pagina'] = array('descricao' => 'Gerenciamento de usuários.');
        $this->variables['usuarios'] = $autenticacaoManager->obterTodos();
    }
}
