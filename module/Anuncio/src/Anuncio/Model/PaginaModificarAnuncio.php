<?php
namespace Anuncio\Model;

use Anuncio\Service\Anuncio as ServiceAnuncio;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class PaginaModificarAnuncio
{
    private $serviceAnuncio;
    
    /**
     * Injeta dependências
     * @param \Anuncio\Service\Anuncio $serviceAnuncio
     */
    public function __construct(ServiceAnuncio $serviceAnuncio)
    {
        $this->serviceAnuncio = $serviceAnuncio;
    }
    
    /**
     * @return \Anuncio\Service\Anuncio
     */
    private function getServiceAnuncio()
    {
        return $this->serviceAnuncio;
    }
    
    /**
     * Obtem a um array com a estrutura da página de administração de informações do site
     * @return array
     */
    public function getArray($id = false)
    {
        if ($id) {
            $descricao = 'Modificar o anúncio #'.$id;
            $anuncio = $this->getServiceAnuncio()->getAnuncio($id)->toArray();
        } else {
            $descricao = 'Incluir um anúncio';
            $anuncio = array();
        }
       
        return array(
            'pagina' => array('descricao' => $descricao),
            'anuncio' => $anuncio
        );
    }
}
