<?php
namespace Compra\Status;

class Status
{
    protected $id;
    protected $nome;
    protected $labelType;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getLabelType()
    {
        return $this->labelType;
    }

    /**
     * @param int $id
     * @return Status
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $nome
     * @return Status
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @param string $labelType
     * @return Status
     */
    public function setLabelType($labelType)
    {
        $this->labelType = $labelType;
        return $this;
    }

    /**
     * Obtem a estrutura da entity Status em formato array
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'label_type' => $this->labelType
        );
    }

    /**
     * Preenche a entidade a partir de um array
     * @return Status
     */
    public function exchangeArray($array)
    {
        return $this->setId($array['id'])
            ->setNome($array['nome'])
            ->setLabelType($array['label_type']);
    }
}