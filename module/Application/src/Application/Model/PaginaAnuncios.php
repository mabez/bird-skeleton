<?php
namespace Application\Model;

use Application\Service\Anuncio as ServiceAnuncio;
use Application\Service\Site as ServiceSite;
use Application\Entity\PaginaAnuncios as Entity;
use \Iterator;

/**
 * Gerador da estrutura da página de anúncios
 */
class PaginaAnuncios
{
    private $serviceAnuncio;
    private $serviceSite;
    
    /**
     * Injeta dependências
     * @param \Application\Service\Anuncio $serviceAnuncio
     * @param \Application\Service\Site $serviceSite
     */
    public function __construct(ServiceAnuncio $serviceAnuncio, ServiceSite $serviceSite)
    {
        $this->serviceAnuncio = $serviceAnuncio;
        $this->serviceSite = $serviceSite;
    }
    
    /**
     * @return \Application\Service\Anuncio
     */
    private function getServiceAnuncio()
    {
        return $this->serviceAnuncio;
    }

    /**
     * @return \Application\Service\Site
     */
    private function getServiceSite()
    {
        return $this->serviceSite;
    }
    
    /**
     * Converte um iderador de anúncios em um vetor de anúncios
     * @param Iterator $iterator iterador
     * @return array
     */
    private function getArrayAnunciosByIterator(Iterator $iterator)
    {
        $retorno = array();
        foreach ($iterator as $anuncio) {
            $retorno[] = $anuncio;
        }
        return $retorno;
    }

    /**
     * Obtem a um array com a estrutura da página de anúncios e as informações
     * do site e dos anúncios atualizadas
     * @return type
     */
    public function getArray()
    {
        return (new Entity())
            ->setAnuncios(
                $this->getArrayAnunciosByIterator(
                    $this->getServiceAnuncio()->getTodosAnuncios()
                )
            )
            ->setSite($this->getServiceSite()->getSiteDefault())
            ->toArray();
    }
}
