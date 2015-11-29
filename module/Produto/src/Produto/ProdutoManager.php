<?php
namespace Produto;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class ProdutoManager implements ServiceManagerAwareInterface
{
    private $serviceManager; 

    /**
     * Insere o serviceManager
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     * @see \Zend\ServiceManager\ServiceManagerAwareInterface::setServiceManager()
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }
    
    /**
     * Obtem o serviceManager
     * @return \Zend\ServiceManager\ServiceManager
     */
    private function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    /**
     * Obtem o Repository dessa entidade
     * @return ProdutoRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('ProdutoRepository');
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