<?php
namespace Compra;

use Anuncio\Anuncio;
use Autenticacao\Autenticacao;
use \DateTime;

class Compra
{

    private $id;

    private $anuncioId;

    private $autenticacaoId;

    private $anuncio;

    private $autenticacao;

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
    public function getAnuncioId()
    {
        return (int) $this->anuncioId;
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
     * @return \Anuncio\Anuncio
     */
    public function getAnuncio()
    {
        return $this->anuncio;
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
     * @param int $anuncioId            
     * @return Compra
     */
    public function setAnuncioId($anuncioId)
    {
        $this->anuncioId = $anuncioId;
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
     * @param \Anuncio\Anuncio $anuncio            
     * @return Compra
     */
    public function setAnuncio($anuncio)
    {
        $this->anuncio = $anuncio;
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
     * Obtem a estrutura da entity Compra em formato array
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'anuncio_id'=>$this->anuncioId,
            'autenticacao_id'=>$this->autenticacaoId
        );
    }

    /**
     * Preenche a entidade a partir de um array
     * @return Compra
     */
    public function exchangeArray($array)
    {
        return $this->setId(isset($array['id'])?$array['id']:null)
            ->setAnuncioId($array['anuncio_id'])
            ->setAutenticacaoId($array['autenticacao_id'])
            ->setData(isset($array['data'])?$array['data']:null);
    }
}