<?php
namespace Anuncio\Model;

use Anuncio\Service\Anuncio as ServiceAnuncio;
use \Iterator;

/**
 * Gerador da estrutura da página de anúncios
 */
class PaginaAnuncios
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
     * Converte um iderador de anúncios em um vetor de anúncios
     * @param Iterator $iterator iterador
     * @param int $quantidadeColunas (default 3)
     * @return array
     */
    private function getArrayAnunciosByIterator(Iterator $iterator, $quantidadeColunas = 3)
    {
        $retorno = array();
        $coluna = 1;
        foreach ($iterator as $anuncio) {
            $retorno['coluna'.$coluna][] = $anuncio->toArray();
            $coluna++;
            if ($coluna > $quantidadeColunas) {
                $coluna = 1;
            }
        }
        return $retorno;
    }

    /**
     * Obtem a um array com a estrutura da página de anúncios atualizados
     * @return type
     */
    public function getArray()
    {
        return $this->getArrayAnunciosByIterator(
            $this->getServiceAnuncio()->getTodosAnuncios()
        );
    }
}
