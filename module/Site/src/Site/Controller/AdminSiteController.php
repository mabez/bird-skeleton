<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;
use Admin\Controller\IndexController as AdminController;

class AdminSiteController extends AdminController
{

    /**
     * Mostra a página de administração das informações do site
     * @return ViewModel
     */
    public function indexAction()
    {
        $viewModel = $this->getViewModelDefault();
        
        $viewModel->setVariables(
            array_merge(
                $viewModel->getVariables(),
                $this->getServiceLocator()->get('PaginaAdminSite')->getArray()
            )
        );
        
        $viewModel->setTemplate('site/admin/site');
        
        return $viewModel;
    }

    /**
     * Salva as informações do site
     * @return ViewModel
     */
    public function salvarAction()
    {
        $model = $this->getServiceLocator()->get('PaginaAdminSite');
        
        $this->setFlashMessagesFromMensagens(
            $model->saveArray($this->params()->fromPost())
        );
        
        $routeRedirect = $this->params()->fromQuery('routeRedirect');
        if ($routeRedirect) {
            $this->redirect()->toRoute($routeRedirect);
        }
        $this->redirect()->toRoute('admin-site');
    }
}
