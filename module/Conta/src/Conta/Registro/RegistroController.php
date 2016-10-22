<?php

namespace Conta\Registro;

use Acesso\AcessoController;
use Notificacao\FlashMessagesContainerTrait;

class RegistroController extends AcessoController
{
    use FlashMessagesContainerTrait;

    protected $resource = 'conta-registro';

    /**
     * Mostra página de Modificação de registro de conta
     * @return ContaRegistroViewModel
     */
    public function modificarAction()
    {
        return $this->getViewModel()->setTemplate('conta/registro/modificar');
    }

    /**
     * Salva o usuário com as informações enviadas por post
     */
    public function salvarAction()
    {
        $params = $this->params()->fromPost();

        $routeRedirect = $this->params('routeRedirect');
        $this->getViewModel()->getForm()->setData($params);

        if ($this->getViewModel()->getForm()->isValid()) {
            $this->getViewModel()->saveArray($this->getViewModel()->getForm()->getData());
            $this->setFlashMessagesFromNotificacoes($this->getViewModel()->getNotificacoes());
        } else {
            $this->setFlashMessagesFromNotificacoes($this->getViewModel()->getForm()->getMessages());
            $routeRedirect = null;
        }

        if (!$routeRedirect) {
            return $this->redirect()->toRoute('conta-registro');
        }

        return $this->redirect()->toRoute($routeRedirect);
    }
}
