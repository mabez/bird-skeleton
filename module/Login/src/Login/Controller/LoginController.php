<?php

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;

class LoginController extends AbstractActionController
{

    /**
     * Mostra a página de login
     * @return ViewModel
     */
    public function indexAction($infoLogin = NULL)
    {
        $this->requerSemPermissao();
        $viewModel = $this->forward()->dispatch(
            'IndexController',
            array(
                'action' => 'index',
            )
        );
        $variables = $viewModel->getVariables();
        $variables['infoLogin'] = $infoLogin;
        $variables['infoLogin']['routeRedirect'] = $this->params()->fromPost('routeRedirect');
        $viewModel->setVariables($variables);
        $viewModel->setTemplate('login/index');
        return $viewModel;
    }
    
    /**
     * Verifica o login se estiver correto redireciona para a página passada no
     * POST caso contrário retorna a view model da página de login.
     * @return ViewModel
     */
    public function entrarAction()
    {
        $usuario = $this->params()->fromPost('usuario');
        $senha = $this->params()->fromPost('senha');
        $paginaLogin = $this->getServiceLocator()->get('PaginaLogin');
        if ($paginaLogin->validaLogin($usuario, $senha)) {
            $this->redirect()->toRoute($this->params()->fromPost('routeRedirect'));
        }
        return $this->indexAction($paginaLogin->getInfo());
    }

    /**
     * Verifica se o usuário está autenticado caso esteja redireciona para url admin
     */
    protected function requerSemPermissao()
    {
        $autenticacao = new AuthenticationService();
        if ($autenticacao->hasIdentity()) {
            $this->redirect()->toRoute('admin');
        }
    }

    /**
     * @return host atual
     */
    protected function getHost()
    {
        $uri = $this->getRequest()->getUri();
        return sprintf('%s://%s:%s', $uri->getScheme(), $uri->getHost(), $uri->getPort());
    }
    
    /**
     * Limpa autenticação e redireciona para a urlRedireciona passada por GET
     */
    public function sairAction()
    {
        $autenticacao = new AuthenticationService();
        $autenticacao->clearIdentity();
        $this->redirect()->toRoute($this->params()->fromQuery('routeRedirect'));
    }
}
