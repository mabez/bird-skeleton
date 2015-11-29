<?php
namespace Conta;

use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de conta
 */
class ContaViewModel extends ViewModel
{
    protected $mensagens = array();

    public function __construct()
    {
        $this->setTituloPagina('Minha Conta');
    }

    protected function setTituloPagina($titulo) {
        $this->variables['pagina']['titulo'] = $titulo;
    }

    protected function setDescricaoPagina($descricao) {
        $this->variables['pagina']['descricao'] = $descricao;
    }
}
