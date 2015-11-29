<?php
namespace Autenticacao;

class Autenticacao
{
    private $id;
    private $usuario;
    private $senha;
    private $perfilId;
    private $perfil;
    
    
    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     * @return Autenticacao
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $usuario
     * @return Autenticacao
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @param string $senha
     * @return Autenticacao
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return int
     */
    public function getPerfilId()
    {
        return $this->perfilId;
    }
    
    /**
     * @param int $perfilId
     * @return \Autenticacao\Login
     */
    public function setPerfilId($perfilId)
    {
        $this->perfilId = $perfilId;
        return $this;
    }

    /**
     * @return \Autenticacao\Perfil\Perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }
    
    /**
     * @param \Autenticacao\Perfil\Perfil $perfil
     * @return Autenticacao
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
        return $this;
    }
    
     /**
     * Obtem a estrutura da entity Autenticacao em formato array
     * @return array
     */
    public function toArray()
    {
        return array(
            'usuario' => $this->getUsuario(),
            'senha' => $this->getSenha(),
            'perfil_id' => $this->getPerfilId()
        );
    }

    /**
     * Preenche a entidade com os campos do array
     * @param array $array
     * @return Autenticacao
     */
    public function exchangeArray($array)
    {
        $this->setId($array['id']);
        $this->usuario = $array['usuario'];
        $this->senha = $array['senha'];
        if (isset($array['perfil_id'])) {
            $this->perfilId = $array['perfil_id'];
        }
        return $this;
    }
}