<?php

namespace Acesso;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class AcessoController extends AbstractActionController
{

    protected $resource = 'acesso';
    protected $defaultRoute = 'site';

    /**
     * 
     * @return \Zend\Http\Response
     */
    private function requerPermissao()
    {
        $redirect = $this->params()->fromQuery('routeRedirect');

        if (!($this->defaultRoute == $this->getEvent()->getRouteMatch()->getMatchedRouteName()) 
            && !$this->getAcessoViewModel()->podeAcessar($this->resource)) {
                
                $this->flashMessenger()->addWarningMessage('Você não tem acesso a esse recurso. Por favor efetue o login com um usuário que tenha esse acesso.');
                return $this->redirect()->toRoute($redirect ? $redirect : $this->defaultRoute);
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
