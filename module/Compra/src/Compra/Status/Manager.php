<?php
namespace Compra\Status;

class Manager
{
    private $repository;

    /**
     *
     * @param StatusRepository $repository
     */
    public function __construct(StatusRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtem o Repository dessa entidade
     * @return StatusRepository
     */
    private function getRepository()
    {
        return $this->repository;
    }

    /**
     * Obtem todas os status de compras registrados
     */
    public function obterTodosStatus()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * Obtem o status identificado pelo id
     * @param int $id
     * @return Status
     */
    public function obterStatus($id)
    {
        return $this->getRepository()->findById($id);
    }

    /**
     * Obtem o status identificado pelo nome
     * @param string $nome
     * @return Status
     */
    public function obterStatusbyNome($nome)
    {
        return $this->getRepository()->findByNome($nome);
    }
}