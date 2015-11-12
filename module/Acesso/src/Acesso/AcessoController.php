<?php

namespace Acesso;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class AcessoController extends AbstractActionController
{

    protected $resource = 'acesso';

    /**
     * 
     * @return \Zend\Http\Response
     */
    private function requerPermissao()
    {
        $redirect = $this->params()->fromQuery('routeRedirect');

        if (!$this->getAcessoViewModel()->podeAcessar($this->resource)) {
            return $this->redirect()->toRoute($redirect ? $redirect : 'site');
        }
    }

    /**
     * Obtem a view model dessa controller
     */
    private function getAcessoViewModel()
    {
        return $this->getServiceLocator()->get('AcessoViewModel');
    }

    /**
     * No evento de disparo, é verificado se o usuário é logado
     * se não for é redirecionado.
     * @see \Zend\Mvc\Controller\AbstractActionController::onDispatch()
     */
    public function onDispatch(MvcEvent $e)
    {
        $this->requerPermissao();
        parent::onDispatch($e);
    }
}
