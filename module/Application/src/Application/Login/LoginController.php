<?php

namespace Application\Login;

use Application\Site\SiteController;

class LoginController extends SiteController
{

    /**
     * Mostra a página de login
     * @return LoginViewModel
     */
    public function indexAction()
    {
        $redirect = $this->requerSemPermissao();
        if ($redirect) {
            return $redirect;
        }

        $viewModel = $this->getViewModel();
        return $viewModel->setTemplate('login/index');
    }

    /**
     * Obtem a ViewModel da página de login
     * @return LoginViewModel
     */
    private function getViewModel()
    {
        return $this->serviceLocator->get('LoginViewModel');
    }

    /**
     * Verifica o login se estiver correto redireciona para a página passada no
     * POST caso contrário redireciona para a página atual
     */
    public function entrarAction()
    {
        $viewModel = $this->getViewModel();
        if ($viewModel->validaLogin($this->params()->fromPost())) {
            return $this->redirect()->toRoute($this->params()->fromPost('routeRedirect'));
        }
        
        $this->setFlashMessagesFromMensagens($viewModel->getMensagens());
        return $this->redirect()->toRoute('login');
    }

    /**
     * Verifica se o usuário está autenticado caso esteja redireciona para url admin
     */
    protected function requerSemPermissao()
    {
        if ($this->getViewModel()->getAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute('admin');
        }
    }
    
    /**
     * Limpa autenticação e redireciona para a urlRedireciona passada por GET
     */
    public function sairAction()
    {
        $this->getViewModel()->getAuthentication()->clearIdentity();
        return $this->redirect()->toRoute($this->params()->fromQuery('routeRedirect'));
    }
}
