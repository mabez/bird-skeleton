<?php
namespace Autenticacao\Identificacao;

class IdentificacaoGenerator
{
    private $identificacaoManager;
    
    /**
     * Injeta dependências
     * @param IdentificacaoManager $identificacaoManager
     */
    public function __construct(IdentificacaoManager $identificacaoManager)
    {
        $this->identificacaoManager = $identificacaoManager;
    }
    
    /**
     * Gera uma identificação para esse login.
     * @param \Autenticacao\Login $autenticacao
     * @param boolean $gravar (default true) se verdadeiro, grava o valor no storage
     * @return \Autenticacao\Identificacao
     */
    public function generate($autenticacao, $gravar = true)
    {
        $identificacao = (new Identificacao())->setValor($autenticacao);
        if ($gravar) {
            $this->identificacaoManager->save($identificacao);
        }
        return $identificacao;
    }
}
