<?php
namespace Application\Site;

use Acesso\AcessoController;
use Zend\View\Model\ViewModel;

class SiteController extends AcessoController
{
    
    protected $resource = 'site';

    /**
     * Mostra a página do site
     * 
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
}
