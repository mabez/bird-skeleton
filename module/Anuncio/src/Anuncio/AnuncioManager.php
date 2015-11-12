<?php
namespace Anuncio;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class AnuncioManager implements ServiceManagerAwareInterface
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
     * @return AnuncioRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('AnuncioRepository');
    }

    /**
     * Obtem todos os anuncios
     * @return Iterator
     */
    public function obterTodos()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * Obtem o anúncio a partir no id
     * @param int $id
     * @return AnuncioManager\Anuncio
     */
    public function getAnuncio($id)
    {
        return $this->getRepository()->findById($id);
    }
    
    /**
     * Salva o anúncio passado por parâmetro
     * @param Anuncio $anuncio
     */
    public function salvar(Anuncio $anuncio)
    {
        return $this->getRepository()->save($anuncio);
    }
    
    /**
     * Remove o anuncio passado por parâmetro
     * @param Anuncio $anuncio
     */
    public function remover(Anuncio $anuncio)
    {
        return $this->getRepository()->removeById($anuncio->getId());
    }
}