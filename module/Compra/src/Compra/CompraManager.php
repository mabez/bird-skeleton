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
            $compra->setAutenticacao($this->getAutenticacaoManager()->obterAutenticacaoBasica($compra->getAutenticacaoId()));
            $compra->setAnuncio($this->getAnuncioManager()->getAnuncio($compra->getAnuncioId()));
            $resultado[] = $compra;
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
     * @return \Anuncio\AnuncioManager
     */
    private function getAnuncioManager()
    {
        return $this->getServiceManager()->get('AnuncioManager');
    }
    
    /**
     * @return \Autenticacao\AutenticacaoManager
     */
    private function getAutenticacaoManager()
    {
        return $this->getServiceManager()->get('AutenticacaoManager');
    }
}