<?php
namespace Autenticacao\Perfil;

class PerfilManager
{
    private $repository;

    /**
     *
     * @param PerfilRepository $repository
     */
    public function __construct(PerfilRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtem o Repository dessa entidade
     * @return PerfilRepository
     */
    private function getRepository()
    {
        return $this->repository;
    }

    /**
     * Econtra Perfil a partir do id
     * @param int $perfilId
     * @return \Autenticacao\PerfilManager
     */
    public function obterPerfil($perfilId)
    {
        return $this->getRepository()->findById($perfilId);
    }

    /**
     * Econtra Perfil a partir do nome
     * @param string $nome
     * @return \Autenticacao\PerfilManager
     */
    public function obterPerfilByNome($nome)
    {
        return $this->getRepository()->findByNome($nome);
    }
}
