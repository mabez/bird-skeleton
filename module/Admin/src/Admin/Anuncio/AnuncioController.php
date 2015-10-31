<?php

namespace Admin\Anuncio;

use Admin\AdminController;

class AnuncioController extends AdminController
{

    /**
     * Mostra a página de administração de anúncios
     * @return AdminAnunciosViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('admin/anuncio/index');
    }
    
    /**
     * Obtem a model da pagina de administração de anuncios
     * @return AdminAnunciosViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('AdminAnunciosViewModel');
    }

    /**
     * Obtem a model da pagina de modificação do anuncio
     * @return AdminAnunciosViewModel
     */
    private function getModificarViewModel()
    {
        return $this->getServiceLocator()->get('AdminModificarAnuncioViewModel');
    }
    
    /**
     * Mostra página de Modificação de anúncio
     * @return AdminModificarAnuncioViewModel
     */
    public function modificarAction()
    {
        return $this->getModificarViewModel()->setTemplate('admin/anuncio/modificar');
    }
    
    /**
     * Salva o anuncio com as informações enviadas por post
     */
    public function salvarAction()
    {
        $params = array_merge_recursive(
            $this->params()->fromPost(),
            $this->params()->fromFiles()
        );

        $routeRedirect = $this->params('routeRedirect');
        $this->getModificarViewModel()->getForm()->setData($params);

        if ($this->getModificarViewModel()->getForm()->isValid()) {
            $this->getModificarViewModel()->saveArray($this->getModificarViewModel()->getForm()->getData());
            $this->setFlashMessagesFromMensagens($this->getModificarViewModel()->getMensagens());
        } else {
            $this->setFlashMessagesFromMensagens($this->getModificarViewModel()->getForm()->getMessages());
            $routeRedirect = null;
        }

        if (!$routeRedirect) {
            return $this->redirect()->toRoute('admin-anuncios-modificar', array('anuncioId' => $params['id']));
        }

        return $this->redirect()->toRoute($routeRedirect);
    }
    
    /**
     * remove o anuncio identificado com o id passado po get
     */
    public function removerAction()
    {
        $id = $this->params('anuncioId');
        $routeRedirect = $this->params('routeRedirect');
        
        $this->getModificarViewModel()->remove($id);
        $this->setFlashMessagesFromMensagens($this->getModificarViewModel()->getMensagens());
        if (!$routeRedirect) {
            return $this->redirect()->toRoute('admin-anuncios');
        }
        
        return $this->redirect()->toRoute($routeRedirect);
    }
}
