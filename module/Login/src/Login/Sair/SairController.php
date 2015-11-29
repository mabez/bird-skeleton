<?php
namespace Login\Sair;

use Acesso\AcessoController;

class SairController extends AcessoController
{
    protected $resource = 'sair';

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
     * Limpa autenticação e redireciona para a urlRedireciona passada por GET
     */
    public function sairAction()
    {
        $this->getViewModel()->limparAutenticacao();
        $redirect = $this->params()->fromQuery('routeRedirect');
        return $this->redirect()->toRoute($redirect ? $redirect : 'site');
    }
}
