<?php

namespace Admin\Site;

use Acesso\AcessoController;
use Notificacao\FlashMessagesContainerTrait;

class SiteController extends AcessoController
{

    use FlashMessagesContainerTrait;
    
    protected $resource = 'admin-site';
    
    /**
     * Mostra a página de administração das informações do site
     * @return AdminSiteViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('admin/admin/site');
    }

    /**
     * Obtem a ViewModel
     * @return AdminSiteViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('AdminSiteViewModel');
    }

    /**
     * Salva as informações do site
     */
    public function salvarAction()
    {
        $viewModel = $this->getViewModel();
        $params = array_merge_recursive(
            $this->params()->fromPost(),
            $this->params()->fromFiles()
        );

        $viewModel->getForm()->setData($params);
        if ($viewModel->getForm()->isValid()) {
            $viewModel->saveArray($viewModel->getForm()->getData());
            $this->setFlashMessagesFromNotificacoes($viewModel->getNotificacoes());

            $routeRedirect = $this->params()->fromQuery('routeRedirect');
            if ($routeRedirect) {
                return $this->redirect()->toRoute($routeRedirect);
            }
        } else {
            $this->setFlashMessagesFromNotificacoes($viewModel->getForm()->getMessages());
        }

        return $this->redirect()->toRoute('admin-site');
    }
}
