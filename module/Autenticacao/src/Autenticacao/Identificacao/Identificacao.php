<?php
namespace Autenticacao\Identificacao;

class Identificacao
{
    private $valor;
    
    /**
     * @return $valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     * @return instancia do objeto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }
}
