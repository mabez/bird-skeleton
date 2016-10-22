<?php
namespace Consumidor\Compra;

use Compra\CompraManager;
use Compra\Compra;
use Zend\View\Model\ViewModel;
use Notificacao\NotificacoesContainerTrait;
use Notificacao\Notificacao;
use Zend\Stdlib\Hydrator\HydrationInterface;
use Zend\EventManager\EventManagerInterface;
use Paypal\ExpressCheckout\ExpressCheckout;
use Paypal\ExpressCheckout\PaymentRequest\PaymentRequest;
use Paypal\ExpressCheckout\PaymentRequest\LPaymentRequest;

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
    private $expressCheckout;

    /**
     * Injeta dependências
     *
     * @param \Produto\ProdutoManager $compraManager
     * @param CompraForm $form
     */
    public function __construct(CompraManager $compraManager, CompraForm $form, HydrationInterface $hydrator, EventManagerInterface $eventManager, ExpressCheckout $expressCheckout, $params = array())
    {
        $this->compraManager = $compraManager;
        $this->hydrator = $hydrator;
        $this->form = $form;
        $this->eventManager = $eventManager;
        $this->expressCheckout = $expressCheckout;

        $produtoId = false;
        extract($params);
        if ($produtoId) {
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

            $this->compraManager->preencherCompra($compra);

            $paymentRequest = new PaymentRequest(0);
            $paymentRequest->setAmt($compra->getProduto()->getPreco()*$compra->getQuantidade());
            $paymentRequest->setCurrencyCode('BRL');
            $paymentRequest->setInvNum(1234);
            $paymentRequest->setItemAmt($compra->getProduto()->getPreco()*$compra->getQuantidade());
            $paymentRequest->setPaymentAction('SALE');

            $lPaymentRequest = new LPaymentRequest();
            $lPaymentRequest->setAmt($compra->getProduto()->getPreco());
            $lPaymentRequest->setDesc($compra->getProduto()->getDescricao());
            $lPaymentRequest->setItemAmt($compra->getProduto()->getPreco());
            $lPaymentRequest->setName($compra->getProduto()->getTitulo());
            $lPaymentRequest->setQty($compra->getQuantidade());
            $paymentRequest->addLPaymentRequest($lPaymentRequest);

            $result = $this->expressCheckout->set($paymentRequest, 'http://localhost:8888', 'http://localhost:8888', 'BR_EC_EMPRESA', 'marcelbzrra@gmail.com');

            $this->eventManager->trigger(self::EVENT_COMPRA_FINALIZADA, $this, $dados);

            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, self::MESSAGE_FINALIZADA_SUCCESS, array(
                $compra->getProdutoId()
            )));
        } catch (\Exception $e) {
            die($e->getMessage().' '.$e->getTraceAsString());
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
