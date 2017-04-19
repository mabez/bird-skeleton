<?php

namespace Admin\Produto;

use Ecompassaro\Notificacao\FlashMessagesContainerTrait;
use Admin\AbstractModificavelController;

class ProdutoController extends AbstractModificavelController
{
    use FlashMessagesContainerTrait;

    protected $resource = 'admin-produto';

    /**
     * Mostra a página de administração de anúncios
     * @return ProdutosViewModel
     */
    public function indexAction()
    {
        return $this->getViewModel()->setTemplate('admin/produto/index');
    }

    /**
     * Mostra página de Modificação de anúncio
     * @return ModificarProdutoViewModel
     */
    public function modificarAction()
    {
        return $this->getModificarViewModel()->setTemplate('admin/produto/modificar');
    }

    /**
     * Salva o produto com as informações enviadas por post
     */
    public function salvarAction()
    {
        $params = array_merge_recursive(
            $this->params()->fromPost(),
            $this->params()->fromFiles()
        );

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
            $id = $params['id'] ? $params['id'] : '0';
            return $this->redirect()->toRoute('admin-produtos-modificar', array('produtoId' => $id));
        }

        return $this->redirect()->toRoute('site');
    }

    /**
     * remove o produto identificado com o id passado po get
     */
    public function removerAction()
    {
        $id = $this->params('produtoId');
        $routeRedirect = $this->params('routeRedirect');

        $this->getModificarViewModel()->remove($id);
        $this->setFlashMessagesFromNotificacoes($this->getModificarViewModel()->getNotificacoes());
        if (!$routeRedirect) {
            return $this->redirect()->toRoute('admin-produto');
        }

        return $this->redirect()->toRoute($routeRedirect);
    }
}
