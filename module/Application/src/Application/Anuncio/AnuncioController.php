<?php

namespace Application\Anuncio;

use Application\Site\SiteController;

class AnuncioController extends SiteController
{
    
    /**
     * Mostra a página de anúncios
     * @return AnunciosViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('anuncio/lista');
    }
    
    /**
     * Obtem a Model da página de anúncios
     * @return AnunciosViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('AnunciosViewModel');
    }
}
