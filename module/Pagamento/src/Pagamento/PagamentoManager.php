<?php
namespace Pagamento;

use Autenticacao\AutenticacaoManager;

class PagamentoManager
{
    private $repository;
    private $autenticacaoManager;

    public function __construct(PagamentoRepository $repository, AutenticacaoManager $autenticacaoManager)
    {
        $this->repository = $repository;
        $this->autenticacaoManager = $autenticacaoManager;
    }

    /**
     * Obtem o Repository dessa entidade
     * @return PagamentoRepository
     */
    private function getRepository()
    {
        return $this->repository;
    }

    /**
     * Salva o pagamento passado por parâmetro
     * @param Pagamento $pagamento
     */
    public function salvar(Pagamento $pagamento)
    {
        return $this->getRepository()->save($pagamento);
    }

    /**
     * Obtem todas os pagamentos registrados
     */
    public function obterTodosPagamentos()
    {
        return $this->preencherLista($this->getRepository()->findAll());
    }

    /**
     * Gera um lista completa de pagamentos
     * @param array $pagamentos
     * @return array
     */
    private function preencherLista($pagamentos)
    {
        $resultado = array();
        foreach ($pagamentos as $pagamento) {
            $resultado[] = $pagamento->setAutenticacao($this->getAutenticacaoManager()->obterAutenticacaoBasica($pagamento->getAutenticacaoId()));
        }

        return $resultado;
    }

    /**
     * @return \Autenticacao\AutenticacaoManager
     */
    private function getAutenticacaoManager()
    {
        return $this->autenticacaoManager;
    }

    public function obterValorTotalPagamentos()
    {
        return $this->getRepository()->sumValor()['sum'];
    }
}