<?php
namespace Login\Registrar;

use Acesso\AcessoController;
use Notificacao\FlashMessagesContainerTrait;

class RegistrarController extends AcessoController
{
    use FlashMessagesContainerTrait;
    
    protected $resource = 'registrar';
    
    /**
     * Obtem a ViewModel da página de registrar
     *
     * @return RegistrarViewModel
     */
    private function getViewModel()
    {
        return $this->serviceLocator->get('RegistrarViewModel');
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
        $viewModel->getFormulario()->setData($this->params()->fromPost());
        if ($viewModel->getFormulario()->isValid() && $viewModel->save()) {
            $redirect = $this->params()->fromPost('routeRedirect');
            $this->getServiceLocator()->get('LoginViewModel')->validaLogin($viewModel->getFormulario()->getData());
            $viewModel->getFormulario($redirect?$redirect:'site');
        }
        
        $mensagens = $viewModel->getNotificacoes();
        if ($mensagens) {
            $this->setFlashMessagesFromNotificacoes($mensagens);
        } else {
            $this->setFlashMessagesFromNotificacoes($viewModel->getFormulario()->getMessages());
        }
        return $this->redirect()->toRoute('registrar');
    }
}
