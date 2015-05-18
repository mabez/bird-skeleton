<?php

namespace Anuncio\Controller;

use Zend\View\Model\ViewModel;
use Admin\Controller\IndexController as AdminIndexController;

class AdminController extends AdminIndexController
{

    /**
     * Mostra a página de administração de anúncios
     * @return ViewModel
     */
    public function indexAction()
    {
        $viewModel = $this->getViewModelDefault();
        $variables = $viewModel->getVariables();
        $variables = array_merge($variables, $this->getServiceLocator()->get('PaginaAdminAnuncios')->getArray());
        $viewModel->setVariables($variables);
        $viewModel->setTemplate('anuncio/admin/index');
        return $viewModel;
    }
    
    /**
     * Mostra página de Modificação de anúncio
     * @return ViewModel
     */
    public function modificarAction()
    {
        $anuncioId = $this->params('anuncioId');
        $routeRedirect = $this->params('routeRedirect');
        
        $viewModel = $this->getViewModelDefault();
        
        $variables = $viewModel->getVariables();
        $variables = array_merge(
            $variables,
            $this->getServiceLocator()->get('PaginaModificarAnuncio')->getArray($anuncioId),
            array('routeRedirect' => $routeRedirect)
        );
        
        $viewModel->setVariables($variables);
        $viewModel->setTemplate('anuncio/admin/modificar');
        
        return $viewModel;
    }
    
    public function salvarAction()
    {
        $params = $this->params()->fromPost();
        $routeRedirect = $this->params('routeRedirect');
        
        $model = $this->getServiceLocator()->get('PaginaAdminAnuncios');
        $model->saveArray($params);
        $this->setFlashMessagesFromMensagens($model->getMensagens());
        if (!$routeRedirect) {
            $url = $this->url()->fromRoute('admin-anuncios-modificar', array('anuncioId' => $params['id']));
            $this->redirect()->toUrl($url);
        }
        $this->redirect()->toRoute($routeRedirect);
    }
    
    public function removerAction()
    {
        $id = $this->params('anuncioId');
        $routeRedirect = $this->params('routeRedirect');
        
        $model = $this->getServiceLocator()->get('PaginaAdminAnuncios');
        $model->remove($id);
        $this->setFlashMessagesFromMensagens($model->getMensagens());
        if (!$routeRedirect) {
            $this->redirect()->toRoute('admin-anuncios');
        }
        $this->redirect()->toRoute($routeRedirect);
    }
}
