<?php
namespace Login\Sair;

use Application\Site\SiteController;

class SairController extends SiteController
{
    protected $resource = 'sair';

     /**
     * Verifica se o usuário está logado
     * @see \Login\Logado\LogadoController::isLogado()
     */
    protected function isLogado()
    {
        return true;
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
     * Limpa autenticação e redireciona para a urlRedireciona passada por GET
     */
    public function sairAction()
    {
        $this->getViewModel()->limparAutenticacao();
        $redirect = $this->params()->fromQuery('routeRedirect');
        return $this->redirect()->toRoute($redirect ? $redirect : 'site');
    }
}
