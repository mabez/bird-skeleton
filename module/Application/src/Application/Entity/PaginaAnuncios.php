<?php
namespace Application\Entity;

class PaginaAnuncios
{
    private $site;
    private $anuncios;
    
    /**
     * Obtem o objeto com as informações do site
     * @return \Application\Entity\Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Obtem uma lista de objetos com informações dos anúncios
     * @return array
     */
    public function getAnuncios()
    {
        return $this->anuncios;
    }

    /**
     * Substitui o objeto onde tem as informções do site
     * @param \Application\Entity\Site $site
     * @return \Application\Entity\PaginaAnuncios
     */
    public function setSite(Site $site)
    {
        $this->site = $site;
        return $this;
    }

    /**
     * Substitui a lista com os objeto onde tem as informções dos anúncios
     * @param array $anuncios
     * @return \Application\Entity\PaginaAnuncios
     */
    public function setAnuncios($anuncios)
    {
        $this->anuncios = $anuncios;
        return $this;
    }
    
    /**
     * Adiciona um objeto com as informaçãoes de um anúncio à lista
     * @param \Application\Entity\Anuncio $anuncio
     * @return \Application\Entity\PaginaAnuncios
     */
    public function addAnuncio(Anuncio $anuncio)
    {
        $this->anuncios[] = $anuncio;
        return $this;
    }
    
    /**
     * Obtem uma lista com os anúncios que estão na coluna especificado com o
     * índice na página de anúncios
     * @param int $indice
     * @return array
     */
    private function getColunaAnuncios($indice)
    {
        $anuncios = $this->getAnuncios();
        for ($i=$indice;$i<count($anuncios);$i+=3) {
            $coluna[] = $anuncios[$i]->toArray();
        }
        return $coluna;
    }

    /**
     * Obtem a estrutura da entity PaginaAnuncios em formato array
     * @return array
     */
    public function toArray()
    {
        return array(
            'site' => $this->getSite()->toArray(),
            'anuncios' => array(
                'coluna1' => $this->getColunaAnuncios(0),
                'coluna2' => $this->getColunaAnuncios(1),
                'coluna3' => $this->getColunaAnuncios(2),
            )
        );
    }
}