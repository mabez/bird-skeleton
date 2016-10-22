<?php
namespace Autenticacao\Identificacao;

class IdentificacaoManager
{
    private $repository;

    /**
     *
     * @param IdentificacaoRepository $repository
     */
    public function __construct(IdentificacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtem o Repository dessa entidade
     * @return IdentificacaoRepository
     */
    private function getRepository()
    {
        return $this->repository;
    }

    /**
     * Salva a identificação passada por parâmetro
     */
    public function save(Identificacao $identificacao)
    {
        return $this->getRepository()->save($identificacao);
    }

    /**
     * Obtem a identificação atual (se houver)
     * @return Identificacao
     */
    public function get()
    {
        return $this->getRepository()->find();
    }
}