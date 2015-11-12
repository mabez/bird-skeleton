<?php
namespace Login\Registrar;

use Application\Site\SiteController;

class RegistrarController extends SiteController
{
    protected $resource = 'registrar';
    
    /**
     * Obtem a ViewModel da página de login
     *
     * @return RegistrarViewModel
     */
    private function getViewModel()
    {
        return $this->serviceLocator->get('RegistrarViewModel');
    }

    /**
     * Verifica se o usuário é anônimo
     *
     * @see \Application\Login\Anonimo\AnonimoController::isAnonimo()
     */
    protected function isAnonimo()
    {
        return ! $this->getViewModel()
            ->getAuthentication()
            ->hasIdentity();
    }

    /**
     * Mostra a página de registrar
     *
     * @return RegistrarViewModel
     */
    public function indexAction()
    {
        $viewModel = $this->getViewModel();
        return $viewModel->setTemplate('login/new');
    }

    /**
     * Cadastra o usuario e redireciona para a página que for passada por parâmetro ou para
     * a página default
     */
    public function registrarAction()
    {
        $viewModel = $this->getViewModel();
        $viewModel->getFormulario()->setData($this->params()
            ->fromPost());
        if ($viewModel->getFormulario()->isValid() && $viewModel->save()) {
            $redirect = $this->params()->fromPost('routeRedirect');
            $this->getServiceLocator()->get('LoginViewModel')->validaLogin($viewModel->getFormulario()->getData());
            $viewModel->getFormulario($redirect?$redirect:'site');
        }
        
        $mensagens = $viewModel->getMensagens() ? $viewModel->getMensagens() : $viewModel->getFormulario()->getMessages();
        $this->setFlashMessagesFromMensagens($mensagens);
        return $this->redirect()->toRoute('registrar');
    }
}
