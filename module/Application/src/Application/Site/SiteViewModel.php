<?php
namespace Application\Site;

use Zend\View\Model\ViewModel;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página do site
 */
class SiteViewModel extends ViewModel
{
    
    protected $uri;
    protected $authentication;
    protected $mensagens= array();
    
    /**
     * Injeta dependências
     * @param \Site\Service\Site $siteManager
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri)
    {
        $this->authentication = $authentication;
        $this->uri = $uri;
        $this->variables['site'] = $siteManager->getSiteDefault()->toArray();
        $this->variables['autenticacao'] = $authentication->hasIdentity();
        $this->variables['host'] = $this->getHost();
    }
    
    /**
     *
     * @return host atual
     */
    public function getHost()
    {
        return sprintf('%s://%s:%s', $this->uri->getScheme(), $this->uri->getHost(), $this->uri->getPort());
    }
    
    public function getAuthentication()
    {
        return $this->authentication;
    }

    public function getMensagens()
    {
        $mensagens = $this->mensagens;
        $this->mensagens = array();
        return $mensagens;
    }

    protected function setMensagens($mensagens)
    {
        $this->mensagens = $mensagens;
        return $this;
    }

    protected function addMessagem(Mensagem $mensagem) {
        $this->mensagens[] = $mensagem;
        return $this;
    }
}
