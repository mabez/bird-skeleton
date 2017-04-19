<?php
namespace Admin\Produto;

use Ecompassaro\Produto\Manager as ProdutoManager;
use Ecompassaro\Produto\Produto;
use Zend\View\Model\ViewModel;
use Ecompassaro\Notificacao\Notificacao;
use Ecompassaro\Notificacao\NotificacoesContainerTrait;
use Admin\ModificarViewModelInterface;

/**
 * Gerador da estrutura da página de administração de informações do produto
 */
class ModificarProdutoViewModel extends ViewModel implements ModificarViewModelInterface
{
    use NotificacoesContainerTrait;

    const MESSAGE_UPDATE_SUCCESS = 'Produto #%s modificado com sucesso!';
    const MESSAGE_INSERT_SUCCESS = 'Produto #%s incluído com sucesso!';
    const MESSAGE_REMOVE_SUCCESS = 'Produto #%d removido com sucesso!';
    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao modificar o anúncio #%s!';
    const MESSAGE_REMOVE_ERROR = 'Ocorreu um erro ao remover o produto #%s! Verifique se já não existe compra para esse produto.';

    private $produtoManager;
    protected $form;

    /**
     * Injeta as dependências
     * @param Produto\ProdutoManager $produtoManager
     * @param ProdutoForm $form
     * @param mixed $params
     */
    public function __construct(ProdutoManager $produtoManager, ProdutoForm $form, $params = array())
    {
        extract($params);
        if (!isset($produtoId)) $produtoId = null;
        if (!isset($redirect)) $redirect = null;

        $produto = $produtoManager->getProduto($produtoId);
        $isNew = false;
        if (!($produto instanceof Produto)) {
            $produto = new Produto();
            $isNew = true;
        }

        $this->variables['pagina'] = array('descricao' => $this->getDescricao($produtoId));
        $this->variables['formulario'] = $form->setEntity($produto)->setNew($isNew)->setRedirect($redirect)->prepare();
        $this->variables['routeRedirect'] = $redirect;
        $this->produtoManager = $produtoManager;
        $this->form = $form;
    }

    /**
     * Obtem a descrição da página
     * @param string $id do produto que está sendo modificado (opcional)
     */
    public function getDescricao($id = null)
    {
        if ($id) {
            return 'Modificar o anúncio #'.$id;
        }
        return 'Incluir um anúncio';
    }


    /**
     * Salva um produto a partir de um array
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $produto = new Produto();
            $produto->exchangeArray($array);

            $id = $produto->getId();
            if ($id == 0) {
                $messageSuccess = self::MESSAGE_INSERT_SUCCESS;
            } else {
                $messageSuccess = self::MESSAGE_UPDATE_SUCCESS;
            }

            $produto = $this->produtoManager->salvar($produto);
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, $messageSuccess, array($produto->getId())));
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, $e->getMessage(), array($id)));
        }

        return true;
    }

    /**
     * Remove um produto a partir de um id
     * @param mixed $id a da instancia a ser removida
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function remove($id)
    {
        try {
            $produto = new Produto();
            $produto->setId($id);

            $this->produtoManager->remover($produto);
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, self::MESSAGE_REMOVE_SUCCESS, array($id)));
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MESSAGE_REMOVE_ERROR, array($id)));
        }

        return true;
    }

    public function getForm()
    {
        return $this->form;
    }
}
