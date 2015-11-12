<?php

namespace Consumidor;

use Application\Site\SiteController;

class ConsumidorController extends SiteController
{
    /**
     * Ação de comprar um anuncio
     * Registra a compra e redireciona a página
     */
    public function comprarAction()
    {
        $params = array(
            'anuncio_id' => $this->params('anuncioId'),
            'autenticacao_id' => $this->getCompraViewModel()->getAuthentication()->getIdentity()->getId()
        );
        
        $routeRedirect = $this->params('routeRedirect');
        
        $this->getCompraViewModel()->getForm()->setData($params);

        if ($this->getCompraViewModel()->getForm()->isValid()) {
            $this->getCompraViewModel()->saveArray($this->getCompraViewModel()->getForm()->getData());
            $this->setFlashMessagesFromMensagens($this->getCompraViewModel()->getMensagens());
        } else {
            $this->setFlashMessagesFromMensagens($this->getCompraViewModel()->getForm()->getMessages());
            $routeRedirect = null;
        }
        
        if (!$routeRedirect) {
            return $this->redirect()->toRoute('site');
        }
        
        return $this->redirect()->toRoute($routeRedirect);
    }
    
    /**
     * @return CompraViewModel
     */
    private function getCompraViewModel()
    {
        return $this->getServiceLocator()->get('CompraViewModel');
    }
}
