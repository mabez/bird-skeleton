<?php
namespace Login\Entity;

class Login
{
    private $usuario;
    private $senha;
    
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
     * @return \Login\Entity\Login
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @param string $senha
     * @return \Login\Entity\Login
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }
    
    /**
     * Obtem a estrutura da entity Anuncio em formato array
     * @return array
     */
    public function toArray()
    {
        return array(
            'usuario' => $this->getUsuario(),
            'senha' => $this->getSenha(),
        );
    }
}