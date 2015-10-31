<?php
namespace Admin;

use Application\Site\SiteController;
use Zend\Mvc\MvcEvent;

class AdminController extends SiteController
{

    /**
     * Mostra a página de admin do site
     * 
     * @return AdminViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel();
    }
    
    /**
     * Obtem a ViewModel
     * 
     * @return AdminViewModel
     */
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('AdminViewModel');
    }

    /**
     * Verifica se o usuário está autenticado caso não esteja redireciona para url de login
     */
    protected function requerPermissao()
    {
        if (! $this->getViewModel()->getAuthentication()->hasIdentity()) {
            $urlAtual = $this->getViewModel()->getHost() . $this->url()->fromRoute();
            $urlLogin = $this->url()->fromRoute('login');
            return $this->redirect()->toUrl($urlLogin . '?urlRedireciona=' . $urlAtual);
        }
    }

    /**
     * No evento de disparo, é verificado se o usuário tem permissão para acessar a página
     * se não tiver é redirecionado.
     * @see \Zend\Mvc\Controller\AbstractActionController::onDispatch()
     */
    public function onDispatch(MvcEvent $e)
    {
        $this->requerPermissao();
        parent::onDispatch($e);
    }
}
