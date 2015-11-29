<?php
namespace Notificacao;

class Notificacao
{
    const TIPO_SUCESSO = 'alert-success';
    const TIPO_ERRO = 'alert-danger';
    const TIPO_ALERTA = 'alert-warning';
    const TIPO_INFORMACAO = 'alert-info';

    private $tipo;
    private $texto;

    /**
     * @param string $tipo
     * @param strng $texto
     * @param array $variaveis a serem colocadas no texto
     */
    public function __construct($tipo, $texto, $variaveis = array())
    {
        $this->setTipo($tipo);
        $this->setTexto(vsprintf($texto, $variaveis));
    }

    /**
     * @return string
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return Notificacao
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexto() {
        return $this->texto;
    }

    /**
     * @param string $texto
     * @param $variaveis a serem colocadas no texto
     * @return Notificacao
     */
    public function setTexto($texto, $variaveis = array()) {
        $this->texto = vsprintf($texto, $variaveis);
        return $this;
    }
}
