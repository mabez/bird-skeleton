<?php
namespace Site\Model;

use Site\Service\Site as ServiceSite;

/**
 * Gerador da estrutura da página do site
 */
class PaginaSite
{
    private $serviceSite;
    
    /**
     * Injeta dependências
     * @param \Site\Service\Site $serviceSite
     */
    public function __construct(ServiceSite $serviceSite)
    {
        $this->serviceSite = $serviceSite;
    }
    

    /**
     * @return \Site\Service\Site
     */
    private function getServiceSite()
    {
        return $this->serviceSite;
    }
    

    /**
     * Obtem a um array com a estrutura da página do site
     * @return array
     */
    public function getArray()
    {
        return array('site' => $this->getServiceSite()->getSiteDefault()->toArray());
    }
}
