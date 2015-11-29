<?php
namespace Consumidor\Compra;

use Compra\CompraManager;
use Compra\Compra;
use Zend\View\Model\ViewModel;
use Notificacao\NotificacoesContainerTrait;
use Notificacao\Notificacao;
use Zend\Stdlib\Hydrator\HydrationInterface;
use Zend\EventManager\EventManagerInterface;

/**
 * Gerador da estrutura da página de anúncios
 */
class CompraViewModel extends ViewModel
{
    
    use NotificacoesContainerTrait;

    const MESSAGE_FINALIZADA_SUCCESS = 'A compra do item #%d foi efetuada com sucesso!';

    const MESSAGE_INTERNAL_ERROR = 'A compra do item #%d não aconteceu!';
    
    const EVENT_COMPRA_FINALIZADA = 'compra.finalizada';

    private $compraManager;
    private $hydrator;
    private $form;
    private $eventManager;

    /**
     * Injeta dependências
     * 
     * @param \Produto\ProdutoManager $compraManager
     * @param CompraForm $form
     */
    public function __construct(CompraManager $compraManager, CompraForm $form, HydrationInterface $hydrator, EventManagerInterface $eventManager, $params = array())
    {
        extract($params);
        $this->compraManager = $compraManager;
        $this->hydrator = $hydrator;
        $this->form = $form;
        $this->eventManager = $eventManager;
        if (isset($produtoId)) {
            $this->variables['formulario'] = $form->setProdutoId($produtoId)->prepare();
            $this->variables['produto'] = $compraManager->getProdutoManager()->getProduto($produtoId);
        }
    }

    /**
     * Finaliza uma compra a partir de um array
     * 
     * @param array $dados
     *            a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function finalizar($dados)
    {
        try {
            $statusFinalizada = $this->compraManager->getStatusManager()->obterStatusbyNome(Compra::STATUS_FINALIZADA);
            $dados['status_id'] = $statusFinalizada->getId();
            $compra = $this->hydrator->hydrate($dados, new Compra());
            $compra = $this->compraManager->salvar($compra);
            $this->eventManager->trigger(self::EVENT_COMPRA_FINALIZADA, $this, $dados);

            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, self::MESSAGE_FINALIZADA_SUCCESS, array(
                $compra->getProdutoId()
            )));
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array(
                $compra->getProdutoId()
            )));
        }
        
        return true;
    }
    
    /**
     * @param array $data
     * @return CompraViewModel
     */
    public function setPreparedData($data)
    {
        $compra = $this->hydrator->hydrate($data, new Compra());
        $this->compraManager->preencherCompra($compra);
        $data['valor'] = $this->compraManager->caucularValorTotal($compra);
        $this->form->setData($data);
        return $this;
    }
    
    /**
     * @return CompraForm
     */
    public function getForm()
    {
        return $this->form;
    }
}
