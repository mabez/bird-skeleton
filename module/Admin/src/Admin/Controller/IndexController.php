<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Site\Controller\IndexController as SiteController;
use Zend\Authentication\AuthenticationService;
use Admin\Entity\Mensagem;

class IndexController extends SiteController
{

    /**
     * Mostra a página de admin do site
     * @return ViewModel
     */
    public function indexAction()
    {
        return $this->getViewModelDefault();
    }
    
    /**
     * Verifica se o usuário está autenticado caso não esteja redireciona para url de login
     */
    protected function requerPermissao()
    {
        $autenticacao = new AuthenticationService();
        if (!$autenticacao->hasIdentity()) {
            $urlAtual = $this->getHost() . $this->url()->fromRoute();
            $urlLogin = $this->url()->fromRoute('login');
            $this->redirect()->toUrl($urlLogin . '?urlRedireciona=' . $urlAtual);
        }
    }

    /**
     * Requer permissao e retorna view model default
     * @param array $messages Mensagens de alerta que eparecem na tela (padrão vazio)
     * @see \Site\Controller\IndexController::getViewModelDefault()
     * @return Zend\View\Model\ViewModel
     */
    protected function getViewModelDefault($messages = array())
    {
        $this->requerPermissao();
        return new ViewModel(
            array_merge(
                $this->getServiceLocator()->get('PaginaSite')->getArray(),
                $this->getServiceLocator()->get('PaginaAdmin')->getArray(),
                array(
                    'host' => $this->getHost(),
                    'autenticacao' => $this->getAutenticacao(),
                    'messages' => $messages
                )
            )
        );
    }

    /**
     * @param array $mensagens com lista de Admin\Entity\Mensagem
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
            }
        }
    }
}
