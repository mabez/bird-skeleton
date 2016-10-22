<?php
namespace Produto;

class ProdutoManager
{
    private $repository;

    /**
     *
     * @param ProdutoRepository $repository
     */
    public function __construct(ProdutoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtem o Repository dessa entidade
     * @return ProdutoRepository
     */
    private function getRepository()
    {
        return $this->repository;
    }

    /**
     * Obtem todos os produtos
     * @return Iterator
     */
    public function obterTodos()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * Obtem o anúncio a partir no id
     * @param int $id
     * @return ProdutoManager\Produto
     */
    public function getProduto($id)
    {
        return $this->getRepository()->findById($id);
    }

    /**
     * Salva o anúncio passado por parâmetro
     * @param Produto $produto
     */
    public function salvar(Produto $produto)
    {
        return $this->getRepository()->save($produto);
    }

    /**
     * Remove o produto passado por parâmetro
     * @param Produto $produto
     */
    public function remover(Produto $produto)
    {
        return $this->getRepository()->removeById($produto->getId());
    }
}