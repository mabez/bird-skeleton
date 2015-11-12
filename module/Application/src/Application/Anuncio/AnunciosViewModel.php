<?php
namespace Application\Anuncio;

use Anuncio\AnuncioManager;
use \Iterator;
use Application\Site\SiteViewModel;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página de anúncios
 */
class AnunciosViewModel extends SiteViewModel
{
    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $autenticacao
     * @param \Zend\Uri\Uri $uri
     * @param \Anuncio\AnuncioManager $anuncioManager
     */
    public function __construct(SiteManager $siteManager,  AuthenticationService $autenticacao, Uri $uri, AnuncioManager $anuncioManager)
    {
        parent::__construct($siteManager, $autenticacao, $uri);
        $this->generateVariablesByAnunciosIterator(
            $anuncioManager->obterTodos()
        );
    }

    /**
     * Converte um iterador de anúncios no formato para imprimir na tela
     * @param Iterator $iterator iterador
     * @param int $quantidadeColunas (default 3)
     */
    private function generateVariablesByAnunciosIterator(Iterator $iterator, $quantidadeColunas = 3)
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
        $this->variables['anuncios'] = $retorno;
    }
}
