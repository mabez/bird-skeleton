<?php
namespace Application\Entity;

class Anuncio
{
    private $titulo;
    private $imagem;
    private $descricao;
    private $preco;
    
    /**
     * Obtem o título do anuncio
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Obtem o caminho da imagem do anúncio
     * @return string
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Obtem o descrição do anuncio
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Obtem o preço do anuncio
     * @return double
     */
    public function getPreco()
    {
        return (double) $this->preco;
    }

    /**
     * Modifica o título do anúncio
     * @param string $titulo
     * @return \Application\Entity\Anuncio
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * Modifica o caminho da imagem do anúncio
     * @param string $imagem
     * @return \Application\Entity\Anuncio
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

    /**
     * Modifica a descrição do anúncio
     * @param string $descricao
     * @return \Application\Entity\Anuncio
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Modifica o preço do anúncio
     * @param mixed $preco pode ser string ou numerico
     * @return \Application\Entity\Anuncio
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }
    
    /**
     * Obtem a estrutura da entity Anuncio em formato array
     * @return array
     */
    public function toArray()
    {
        return array(
            'titulo' => $this->getTitulo(),
            'imagem' => $this->getImagem(),
            'descricao' => $this->getDescricao(),
            'preco' => $this->getPreco()
        );
    }
}