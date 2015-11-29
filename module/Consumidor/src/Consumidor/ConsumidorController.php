<?php

namespace Consumidor;

use Acesso\AcessoController;
use Notificacao\FlashMessagesContainerTrait;

class ConsumidorController extends AcessoController
{
    use FlashMessagesContainerTrait;
    
    protected $resource = 'comprar';

    /**
     * Ação de comprar um produto
     * Registra a compra e redireciona a página
     */
    public function executarCompraAction()
    {
        $callbackIdentificacaoId = $this->getServiceLocator()->get("ViewHelperManager")->get('identificacaoId');
        $params = array_merge_recursive(
            $this->params()->fromPost(),
            array(
                'autenticacao_id' => $callbackIdentificacaoId()
            )
        );
        
        $routeRedirect = $this->params('routeRedirect');
        $this->getCompraViewModel()->setPreparedData($params);

        if ($this->getCompraViewModel()->getForm()->isValid()) {
            $this->getCompraViewModel()->finalizar($this->getCompraViewModel()->getForm()->getData());
            $this->setFlashMessagesFromNotificacoes($this->getCompraViewModel()->getNotificacoes());
        } else {
            $this->setFlashMessagesFromNotificacoes($this->getCompraViewModel()->getForm()->getMessages());
            $routeRedirect = null;
        }
        
        if (!$routeRedirect) {
            return $this->redirect()->toRoute('site');
        }
        
        return $this->redirect()->toRoute($routeRedirect);
    }
    
    public function comprarAction()
    {
        return $this->getCompraViewModel()->setTemplate('comprar/index');
    }

    /**
     * @return CompraViewModel
     */
    private function getCompraViewModel()
    {
        return $this->getServiceLocator()->get('CompraViewModel');
    }
}
