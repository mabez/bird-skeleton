<?php
namespace Login\Identificacao;

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
     * @param \Login\Login $login
     * @param boolean $gravar (default true) se verdadeiro, grava o valor no storage
     * @return \Login\Identificacao
     */
    public function generate($login, $gravar = true)
    {
        $hash = md5($login->getUsuario() . $login->getSenha() . time());
        $identificacao = (new Identificacao())->setValor($hash);
        if ($gravar) {
            $this->identificacaoManager->save($identificacao);
        }
        return $identificacao;
    }
}
