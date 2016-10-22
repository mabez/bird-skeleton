<?php
namespace Autenticacao;

use Autenticacao\Perfil\PerfilManager;
class AutenticacaoManager
{
    private $repository;
    private $adapter;
    private $perfilManager;

    /**
     *
     * @param AutenticacaoRepository $repository
     * @param AutenticacaoAdapter $adapter
     * @param PerfilManager $perfilManager
     */
    public function __construct(AutenticacaoRepository $repository, AutenticacaoAdapter $adapter, PerfilManager $perfilManager)
    {
        $this->repository = $repository;
        $this->adapter = $adapter;
        $this->perfilManager = $perfilManager;
    }

    /**
     * Obtem o Repository dessa entidade
     * @return AutenticacaoRepository
     */
    private function getRepository()
    {
        return $this->repository;
    }

    /**
     * Obtem o adapter de autenticacao
     * @return AutenticacaoAdapter
     */
    private function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Obtem o gerenciador da entidade de perfil
     * @return \Autenticacao\Perfil\PerfilManager
     */
    public function getPerfilManager()
    {
        return $this->perfilManager;
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
     * @param Autenticacao $autenticacao
     * @return \Zend\Authentication\Result
     */
    public function autenticar(Autenticacao $autenticacao)
    {
        return $this->getAdapter()
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
                    $this->getAdapter()
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
