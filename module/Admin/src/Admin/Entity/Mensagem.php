<?php
namespace Admin\Entity;

class Mensagem
{
    const TIPO_SUCESSO = 'alert-success';
    const TIPO_ERRO = 'alert-danger';
    const TIPO_ALERTA = 'alert-warning';
    const TIPO_INFORMACAO = 'alert-info';

    private $tipo;
    private $texto;

    public function __construct($tipo, $texto, $variaveis = array())
    {
        $this->setTipo($tipo);
        $this->setTexto(vsprintf($texto, $variaveis));
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto, $variaveis = array()) {
        $this->texto = vsprintf($texto, $variaveis);
        return $this;
    }
}
?>