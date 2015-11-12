<?php
namespace Admin;

use Application\Site\SiteController;

class AdminController extends SiteController
{

    protected $resource = 'admin';
    
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
}
