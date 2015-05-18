<?php

namespace Anuncio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AnuncioController extends AbstractActionController
{

    /**
     * Mostra a página de anúncios
     * @return ViewModel
     */
    public function indexAction()
    {
        $viewModel = $this->forward()->dispatch(
            'IndexController',
            array(
                'action' => 'index',
            )
        );
        $variables = $viewModel->getVariables();
        $variables['anuncios'] = $this->getServiceLocator()->get('PaginaAnuncios')->getArray();
        $viewModel->setVariables($variables);
        $viewModel->setTemplate('anuncio/lista');
        return $viewModel;
    }
}
