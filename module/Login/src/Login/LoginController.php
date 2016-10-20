<?php
namespace Login;

use Acesso\AcessoController;
use Notificacao\FlashMessagesContainerTrait;

class LoginController extends AcessoController
{
    use FlashMessagesContainerTrait;

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

        $this->setFlashMessagesFromNotificacoes($viewModel->getNotificacoes());
        return $this->redirect()->toRoute('login');
    }
}
