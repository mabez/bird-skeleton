<?php

namespace Site\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;

class IndexController extends AbstractActionController
{

    /**
     * Mostra a página do site
     * @return ViewModel
     */
    public function indexAction()
    {
        return $this->getViewModelDefault();
    }
    
    /**
     * Retorna view model default
     * @see \Site\Controller\IndexController::getViewModelDefault()
     * @return Zend\View\Model\ViewModel
     */
    protected function getViewModelDefault()
    {
        return new ViewModel(
            array_merge(
                $this->getServiceLocator()
                    ->get('PaginaSite')
                    ->getArray(),
                array(
                    'host' => $this->getHost(),
                    'autenticacao' => $this->getAutenticacao()
                )
            )
        );
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
     * Verifica se existe autenticação
     * @return \Zend\Authentication\bool
     */
    protected function getAutenticacao()
    {
        $autenticacao = new AuthenticationService();
        return $autenticacao->hasIdentity();
    }
}
