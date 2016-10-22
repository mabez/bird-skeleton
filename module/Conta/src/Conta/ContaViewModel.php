<?php
namespace Conta;

use Acesso\AcessoViewModel;
use Acesso\Acesso;

/**
 * Gerador da estrutura da página de conta
 */
class ContaViewModel extends AcessoViewModel
{
    protected $mensagens = array();

    public function __construct(Acesso $acesso)
    {
        parent::__construct($acesso);
        $this->setTituloPagina('Minha Conta');
    }

    protected function setTituloPagina($titulo) {
        $this->variables['pagina']['titulo'] = $titulo;
    }

    protected function setDescricaoPagina($descricao) {
        $this->variables['pagina']['descricao'] = $descricao;
    }
}
