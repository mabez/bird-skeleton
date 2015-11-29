<?php
namespace Compra;

use Produto\Produto;
use Autenticacao\Autenticacao;
use \DateTime;

class Compra
{
    const QUANTIDADE_DAFAULT = 1;
    const STATUS_GERADA = 'gerada';
    const STATUS_SINCRONIZADA = 'sincronizada';
    const STATUS_EFETUADA = 'efetuada';
    const STATUS_FINALIZADA = 'finalizada';
    const STATUS_CANCELADA = 'cancelada';

    private $id;

    private $produtoId;

    private $autenticacaoId;

    private $produto;

    private $autenticacao;

    private $data;
    
    private $quantidade;
    
    private $status;
    
    private $statusId;

    /**
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     *
     * @param int $id            
     * @return Compra
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @return int
     */
    public function getProdutoId()
    {
        return (int) $this->produtoId;
    }

    /**
     *
     * @return int
     */
    public function getAutenticacaoId()
    {
        return (int) $this->autenticacaoId;
    }

    /**
     *
     * @return \Produto\Produto
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     *
     * @return \Autenticacao\Autenticacao
     */
    public function getAutenticacao()
    {
        return $this->autenticacao;
    }

    /**
     *
     * @param int $produtoId            
     * @return Compra
     */
    public function setProdutoId($produtoId)
    {
        $this->produtoId = $produtoId;
        return $this;
    }

    /**
     *
     * @param int $autenticacaoId            
     * @return Compra
     */
    public function setAutenticacaoId($autenticacaoId)
    {
        $this->autenticacaoId = $autenticacaoId;
        return $this;
    }

    /**
     *
     * @param \Produto\Produto $produto            
     * @return Compra
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
        return $this;
    }

    /**
     *
     * @param \Autenticacao\Autenticacao $autenticacao            
     * @return Compra
     */
    public function setAutenticacao($autenticacao)
    {
        $this->autenticacao = $autenticacao;
        return $this;
    }

    /**
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     *
     * @param \DateTime|string $data se string deve vir no formato Y-m-d H:i:s        
     * @return Compra
     */
    public function setData($data)
    {
        if(!($data instanceof DateTime)) {
            $data = explode('.', $data)[0];
            $data = DateTime::createFromFormat('Y-m-d H:i:s', $data);
        }
        $this->data = $data;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getQuantidade()
    {
        return (int) $this->quantidade;
    }

    /**
     * @param int $quantidade
     * @return Compra
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param int $statusId
     * @return Compra
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
        return $this;
    }

    /**
     * @return \Compra\Compra\Status\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \Compra\Compra\Status\Status $status
     * @return Compra
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    
    /**
     * Obtem a estrutura da entity Compra em formato array
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'produto_id' => $this->produtoId,
            'autenticacao_id' => $this->autenticacaoId,
            'status_id' => $this->statusId,
            'quantidade' => $this->quantidade
        );
    }

    /**
     * Preenche a entidade a partir de um array
     * @return Compra
     */
    public function exchangeArray($array)
    {
        return $this->setId(isset($array['id'])?$array['id']:null)
            ->setProdutoId($array['produto_id'])
            ->setStatusId(isset($array['status_id'])?$array['status_id']:null)
            ->setAutenticacaoId($array['autenticacao_id'])
            ->setData(isset($array['data'])?$array['data']:null)
            ->setQuantidade(isset($array['quantidade'])?$array['quantidade']:self::QUANTIDADE_DAFAULT);
    }
}