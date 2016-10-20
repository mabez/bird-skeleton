<?php

namespace Admin\Usuario;

use Notificacao\FlashMessagesContainerTrait;
use Admin\AbstractModificavelController;

class UsuarioController extends AbstractModificavelController
{
    use FlashMessagesContainerTrait;

    protected $resource = 'admin-usuario';

    /**
     * Mostra a página de administração de usuários
     * @return AdminUsuarioViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('admin/usuario/index');
    }

    /**
     * Mostra página de Modificação de usuário
     * @return AdminModificarUsuarioViewModel
     */
    public function modificarAction()
    {
        return $this->getModificarViewModel()->setTemplate('admin/usuario/modificar');
    }

    /**
     * Salva o usuário com as informações enviadas por post
     */
    public function salvarAction()
    {
        $params = $this->params()->fromPost();

        $routeRedirect = $this->params('routeRedirect');
        $this->getModificarViewModel()->getForm()->setData($params);

        if ($this->getModificarViewModel()->getForm()->isValid()) {
            $this->getModificarViewModel()->saveArray($this->getModificarViewModel()->getForm()->getData());
            $this->setFlashMessagesFromNotificacoes($this->getModificarViewModel()->getNotificacoes());
        } else {
            $this->setFlashMessagesFromNotificacoes($this->getModificarViewModel()->getForm()->getMessages());
            $routeRedirect = null;
        }

        if (!$routeRedirect) {
            return $this->redirect()->toRoute('admin-usuario-modificar', array('usuarioId' => $params['id']));
        }

        return $this->redirect()->toRoute($routeRedirect);
    }

    /**
     * remove o usuario identificado com o id passado po get
     */
    public function removerAction()
    {
        $id = $this->params('usuarioId');
        $routeRedirect = $this->params('routeRedirect');

        $this->getModificarViewModel()->remove($id);
        $this->setFlashMessagesFromNotificacoes($this->getModificarViewModel()->getNotificacoes());
        if (!$routeRedirect) {
            return $this->redirect()->toRoute('admin-usuario');
        }

        return $this->redirect()->toRoute($routeRedirect);
    }
}
