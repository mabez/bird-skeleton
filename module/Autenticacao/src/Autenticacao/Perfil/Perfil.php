<?php
namespace Autenticacao\Perfil;

class Perfil
{
    private $id;
    private $nome;
    
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Perfil
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Perfil
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Obtem a estrutura da entity Perfil em formato array
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'nome' => $this->getNome()
        );
    }

    /**
     * Preenche o bbjeto com os valores do array
     * @param array $array
     * @return Perfil
     */
    public function exchangeArray($array)
    {
        return $this->setId($array['id'])
            ->setNome($array['nome']);
    }
}