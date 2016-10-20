<?php
namespace Admin\Usuario;

use Autenticacao\AutenticacaoManager;
use Acesso\AcessoViewModel;
use Acesso\Acesso;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class UsuarioViewModel extends AcessoViewModel
{

    /**
     * Injeta dependências
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     */
    public function __construct(Acesso $acesso, AutenticacaoManager $autenticacaoManager)
    {
        parent::__construct($acesso);
        $this->variables['pagina'] = array('descricao' => 'Gerenciamento de usuários.');
        $this->variables['usuarios'] = $autenticacaoManager->obterTodos();
    }
}
