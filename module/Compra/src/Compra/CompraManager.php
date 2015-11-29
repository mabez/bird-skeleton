<?php
namespace Compra;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use \Iterator;

class CompraManager implements ServiceManagerAwareInterface
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
     * @return CompraRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('CompraRepository');
    }

    /**
     * Salva a compra passada por parâmetro
     * @param Compra $compra
     */
    public function salvar(Compra $compra)
    {
        return $this->getRepository()->save($compra);
    }
    
    /**
     * Obtem todas as compras registradas
     */
    public function obterTodasCompras()
    {
        return $this->generateListByIterator($this->getRepository()->findAll());
    }
    
    /**
     * Gera um lista completa de compras a partir de um iterator
     * @param Iterator $iterator
     */
    private function generateListByIterator(Iterator $iterator)
    {
        $resultado = array();
        foreach ($iterator as $compra) {
            $resultado[] = $this->preencherCompra($compra);
        }
        
        return $resultado;
    }
    
    /**
     * Obtem todas as compra relacionadas a autenticacao informada
     * @param int $autentcacaoId
     */
    public function obterTodasComprasAutenticacao($autentcacaoId)
    {
        return $this->generateListByIterator($this->getRepository()->findAllByAutenticacaoId($autentcacaoId));
    }
    
    /**
     * @return \Produto\ProdutoManager
     */
    public function getProdutoManager()
    {
        return $this->getServiceManager()->get('ProdutoManager');
    }
    
    /**
     * @return \Autenticacao\AutenticacaoManager
     */
    private function getAutenticacaoManager()
    {
        return $this->getServiceManager()->get('AutenticacaoManager');
    }

    /**
     * Cauculo do valor total da compra
     * @param Compra $compra
     * @return double
     */
    public function caucularValorTotal(Compra $compra)
    {
        return $compra->getProduto()->getPreco() * $compra->getQuantidade();
    }

    /**
     * Preenche as entidades relacionadas na compra
     * @param Compra $compra
     * @return \Compra\Compra
     */
    public function preencherCompra(Compra $compra)
    {
        $compra->setProduto($this->getProdutoManager()->getProduto($compra->getProdutoId()));
        $compra->setAutenticacao($this->getAutenticacaoManager()->obterAutenticacaoBasica($compra->getAutenticacaoId()));
        $compra->setStatus($this->getStatusManager()->obterStatus($compra->getStatusId()));
        return $compra;
    }

    /**
     * @return \Compra\Compra\Status\StatusManager
     */
    public function getStatusManager()
    {
        return $this->getServiceManager()->get('CompraStatusManager');
    }
}