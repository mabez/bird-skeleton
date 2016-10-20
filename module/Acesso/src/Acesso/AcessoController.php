<?php
namespace Acesso;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class AcessoController extends AbstractActionController
{

    protected $resource = 'acesso';

    protected $defaultRoute = 'site';

    protected $viewModel;

    public function __construct(AcessoViewModel $viewModel)
    {
        $this->viewModel = $viewModel;
    }

    /**
     *
     * @return \Zend\Http\Response
     */
    private function requerPermissao()
    {
        $redirect = $this->params()->fromQuery('routeRedirect');

        if (! ($this->defaultRoute == $this->getEvent()
            ->getRouteMatch()
            ->getMatchedRouteName()) && ! $this->getViewModel()->podeAcessar($this->resource)) {

            $this->flashMessenger()->addWarningMessage('Você não tem acesso a esse recurso. Por favor efetue o login com um usuário que tenha esse acesso.');
            return $this->redirect()->toRoute($redirect ? $redirect : $this->defaultRoute);
        }
    }

    /**
     * Obtem a view model dessa controller
     *
     * @return \Zend\View\Model\ViewModel
     */
    protected function getViewModel()
    {
        if (! ($this->viewModel instanceof AcessoViewModel)) {
            throw new AcessoMalUsoException('Acesso\AcessoControler->viewModel deve ser um instância de Acesso\AcessoViewModel');
        }

        return $this->viewModel;
    }

    /**
     * No evento de disparo, é verificado se o usuário é logado
     * se não for é redirecionado.
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::onDispatch()
     */
    public function onDispatch(MvcEvent $e)
    {
        $this->requerPermissao();
        parent::onDispatch($e);
    }
}
