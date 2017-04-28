<?php
namespace Application\Site;

use Zend\View\Helper\AbstractHelper;
use Ecompassaro\Site\Manager as SiteManager;
use Zend\Session\Container;

class SiteDefaultViewHelper extends AbstractHelper
{
    private $siteManager;
    private $cacheSite;

    /**
     * Retorna as informações do site padrão
     */
    public function __invoke()
    {
        if (!$this->cacheSite->offsetExists('objeto')) {
            $this->cacheSite->offsetSet('objeto', $this->siteManager->obterPrimeiroSite());
        }

        return $this->cacheSite->offsetGet('objeto');
    }

    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteManager
     */
    public function __construct(SiteManager $siteManager, Container $cacheSite)
    {
        $this->siteManager = $siteManager;
        $this->cacheSite = $cacheSite;
    }
}
