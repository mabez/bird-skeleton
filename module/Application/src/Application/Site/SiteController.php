<?php
namespace Application\Site;

use Zend\Mvc\Controller\AbstractActionController;
use Application\Site\Mensagem;

class SiteController extends AbstractActionController
{

    /**
     * Mostra a página do site
     * 
     * @return ViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel();
    }
    
    private function getViewModel()
    {
        return $this->getServiceLocator()->get('SiteViewModel');
    }

    /**
     *
     * @param array $mensagens
     *            com lista de Admin\Mensagem ou lista de strings
     */
    protected function setFlashMessagesFromMensagens($mensagens)
    {
        $tipoAlerta = Mensagem::TIPO_ALERTA;
        $tipoErro = Mensagem::TIPO_ERRO;
        $tipoInformacao = Mensagem::TIPO_INFORMACAO;
        $tipoSucesso = Mensagem::TIPO_SUCESSO;
        
        foreach ($mensagens as $mensagem) {
            if ($mensagem instanceof Mensagem) {
                switch ($mensagem->getTipo()) {
                    case $tipoAlerta:
                        $this->flashMessenger()->addWarningMessage($mensagem->getTexto());
                        break;
                    case $tipoErro:
                        $this->flashMessenger()->addErrorMessage($mensagem->getTexto());
                        break;
                    case $tipoInformacao:
                        $this->flashMessenger()->addInfoMessage($mensagem->getTexto());
                        break;
                    case $tipoSucesso:
                        $this->flashMessenger()->addSuccessMessage($mensagem->getTexto());
                        break;
                    default:
                        break;
                }
            } else {
                $this->flashMessenger()->addErrorMessage($mensagem);
            }
        }
    }
}
