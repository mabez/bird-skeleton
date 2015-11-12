<?php

namespace Conta\Registro;

use Application\Site\SiteController;

class RegistroController extends SiteController
{
    protected $resource = 'conta-registro';
    
    /**
     * Obtem a model da pagina de gerenciamento do registro da conta
     * @return ContaRegistroViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('ContaRegistroViewModel');
    }

    /**
     * Mostra página de Modificação de registro de conta
     * @return ContaRegistroViewModel
     */
    public function modificarAction()
    {
        return $this->getViewModel()->setTemplate('conta/registro/modificar');
    }

    /**
     * Salva o anuncio com as informações enviadas por post
     */
    public function salvarAction()
    {
        $params = $this->params()->fromPost();

        $routeRedirect = $this->params('routeRedirect');
        $this->getViewModel()->getForm()->setData($params);

        if ($this->getViewModel()->getForm()->isValid()) {
            $this->getViewModel()->saveArray($this->getViewModel()->getForm()->getData());
            $this->setFlashMessagesFromMensagens($this->getViewModel()->getMensagens());
        } else {
            $this->setFlashMessagesFromMensagens($this->getViewModel()->getForm()->getMessages());
            $routeRedirect = null;
        }

        if (!$routeRedirect) {
            return $this->redirect()->toRoute('conta-registro');
        }

        return $this->redirect()->toRoute($routeRedirect);
    }
}
