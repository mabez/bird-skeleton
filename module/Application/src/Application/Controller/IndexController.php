<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    /**
     * Mostra a página de anuncios
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel(
            $this->getServiceLocator()->get('PaginaAnuncios')->getArray()
        );
    }

}
