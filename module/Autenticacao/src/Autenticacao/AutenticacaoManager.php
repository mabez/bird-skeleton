<?php
namespace Autenticacao;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class AutenticacaoManager implements ServiceManagerAwareInterface
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
     * @return AutenticacaoRepository
     */
    private function getRepository()
    {
        return $this->getServiceManager()->get('AutenticacaoRepository');
    }

    /**
     * Obtem o gerenciador da entidade de perfil
     * @return \Autenticacao\Perfil\PerfilManager
     */
    public function getPerfilManager()
    {
        return $this->getServiceManager()->get('PerfilManager');
    }

    /**
     * Econtra Autenticacao, trazendo o dados básicos a partir do id
     * @param int $id
     * @return Autenticacao
     */
    public function obterAutenticacaoBasica($id)
    {
        return $this->getRepository()->findById($id);
    }

    /**
     * Econtra uma lista de todas Autenticacoes, trazendo o dados básicos
     * @return \Iterator
     */
    public function obterTodos()
    {
        return $this->getRepository()->findAll();
    }
    
    /**
     * Econtra Autenticacao trazendo todos os relacionamentos a partir do usuario e senha
     * @param string $usuario
     * @param string $senha
     * @return Autenticacao
     */
    public function obterAutenticacaoCompleta($usuario, $senha)
    {
        $autenticacao = $this->getRepository()->findByUsuarioSenha($usuario, $senha);
        return $autenticacao ? $autenticacao->setPerfil($this->getPerfilManager()->obterPerfil($autenticacao->getPerfilId())): null;
    }
    
    /**
     * @param Autenticacao $autenticacao
     * @return \Zend\Authentication\Result
     */
    public function autenticar(Autenticacao $autenticacao)
    {
        return $this->getServiceManager()->get('AutenticacaoAdapter')
            ->setAutenticacao($autenticacao)
            ->authenticate();
    }
    
    /**
     * Salva a Autenticacao passado por parâmetro
     * @param Autenticacao $autenticacao
     */
    public function salvar(Autenticacao $autenticacao)
    {
        try{
            return $this->getRepository()
                ->save(
                    $this->getServiceManager()
                        ->get('AutenticacaoAdapter')
                        ->setAutenticacao($autenticacao)
                        ->getPreparedAutenticacao()
                );
        }catch(\Exception $e) {
            var_dump($e->getMessage().' '.$e->getTraceAsString());die;
        }
    }
    
    /**
     * Remove a autenticacao passada por parâmetro
     * @param Autenticacao $autenticacao
     */
    public function remover(Autenticacao $autenticacao)
    {
        return $this->getRepository()->removeById($autenticacao->getId());
    }
}
