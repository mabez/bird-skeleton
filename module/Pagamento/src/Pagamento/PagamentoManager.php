<?php
namespace Pagamento;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class PagamentoManager implements ServiceManagerAwareInterface
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
     * @return PagamentoRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('PagamentoRepository');
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
        return $this->getServiceManager()->get('AutenticacaoManager');
    }
    
    public function obterValorTotalPagamentos()
    {
        return $this->getRepository()->sumValor()['sum'];
    }
}