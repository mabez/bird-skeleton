<?php
namespace Pagamento;

use Autenticacao\Autenticacao;
use \DateTime;

class Pagamento
{
    private $id;

    private $autenticacaoId;

    private $autenticacao;

    private $valor;

    private $data;
    
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
     * @return Pagamento
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
    public function getAutenticacaoId()
    {
        return (int) $this->autenticacaoId;
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
     * @param int $autenticacaoId            
     * @return Pagamento
     */
    public function setAutenticacaoId($autenticacaoId)
    {
        $this->autenticacaoId = $autenticacaoId;
        return $this;
    }

    /**
     *
     * @param \Autenticacao\Autenticacao $autenticacao            
     * @return Pagamento
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
     * @return Pagamento
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
     * @return double
     */
    public function getValor()
    {
        return (double) $this->valor;
    }

    /**
     * @param double $valor
     * @return Pagamento
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * Obtem a estrutura da entity Pagamento em formato array
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'autenticacao_id' => $this->autenticacaoId,
            'valor' => $this->valor
        );
    }

    /**
     * Preenche a entidade a partir de um array
     * @return Pagamento
     */
    public function exchangeArray($array)
    {
        return $this->setId(isset($array['id'])?$array['id']:null)
            ->setAutenticacaoId($array['autenticacao_id'])
            ->setValor($array['valor'])
            ->setData(isset($array['data'])?$array['data']:null);
    }
}