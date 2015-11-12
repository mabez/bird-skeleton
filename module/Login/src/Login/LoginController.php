<?php
namespace Login;

use Application\Site\SiteController;

class LoginController extends SiteController
{
    protected $resource = 'login';
    
    /**
     * Mostra a página de login
     * 
     * @return LoginViewModel
     */
    public function indexAction()
    {
        $viewModel = $this->getViewModel();
        return $viewModel->setTemplate('login/index');
    }

    /**
     * Obtem a ViewModel da página de login
     * 
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
        if ($viewModel->validaLogin($this->params()
            ->fromPost())) {
                $redirect = $this->params()
                ->fromPost('routeRedirect');
            return $this->redirect()->toRoute($redirect?$redirect:'site');
        }
        
        $this->setFlashMessagesFromMensagens($viewModel->getMensagens());
        return $this->redirect()->toRoute('login');
    }
}
