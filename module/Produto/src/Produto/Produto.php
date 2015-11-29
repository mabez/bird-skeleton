<?php
namespace Produto;

class Produto
{
    private $id;
    private $titulo;
    private $imagem;
    private $descricao;
    private $preco;

    /**
     * Obtem o id do produto
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Obtem o título do produto
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
     * Obtem o descrição do produto
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Obtem o preço do produto
     * @return double
     */
    public function getPreco()
    {
        return (double) $this->preco;
    }

    /**
     * Modifica o id do anúncio
     * @param int $id
     * @return Produto
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * Modifica o título do anúncio
     * @param string $titulo
     * @return Produto
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }
    
    /**
     * Modifica o caminho da imagem do anúncio
     * @param string $imagem
     * @return Produto
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

    /**
     * Modifica a descrição do anúncio
     * @param string $descricao
     * @return Produto
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Modifica o preço do anúncio
     * @param mixed $preco pode ser string ou numerico
     * @return Produto
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }
    
    /**
     * Obtem a estrutura da entity Produto em formato array
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'titulo' => $this->getTitulo(),
            'imagem' => $this->getImagem(),
            'descricao' => $this->getDescricao(),
            'preco' => $this->getPreco()
        );
    }
    
    /**
     * Preenche a entidade a partir de um array
     */
    public function exchangeArray($array)
    {
        if (!empty($array['id'])) {
            $this->setId($array['id']);
        }
        $this->setTitulo($array['titulo']);
        if (isset($array['imagem']['tmp_name']) && !empty($array['imagem']['tmp_name'])) {
            $this->setImagem(basename($array['imagem']['tmp_name']));
        } elseif(isset($array['imagemAntiga'])) {
            $this->setImagem($array['imagemAntiga']);
        } else {
            $this->setImagem($array['imagem']);
        }
        unset($array['imagemAntiga']);
        $this->setDescricao($array['descricao']);
        $this->setPreco($array['preco']);
        return $this;
    }
}