<?php
namespace Login\Model;

use Login\Entity\Identificacao;
use Login\Service\Identificacao as ServiceIdentificacao;

class IdentificacaoGenerator
{
    private $serviceIdentificacao;
    
    public function __construct(ServiceIdentificacao $serviceIdentificacao)
    {
        $this->serviceIdentificacao = $serviceIdentificacao;
    }
    
    /**
     * Gera uma identificação para esselogin.
     * @param \Login\Entity\Login $login
     * @param boolean $gravar (default true) se verdadeiro, grava o valor no storage
     * @return \Login\Entity\Identificacao
     */
    public function generate($login, $gravar = true)
    {
        $hash = md5($login->getUsuario() . $login->getSenha() . time());
        $identificacao = (new Identificacao())->setValor($hash);
        if ($gravar) {
            $this->serviceIdentificacao->save($identificacao);
        }
        return $identificacao;
    }
}
