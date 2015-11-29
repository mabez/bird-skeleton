<?php
namespace Admin\Usuario;

use Autenticacao\AutenticacaoManager;
use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class UsuarioViewModel extends ViewModel
{

    /**
     * Injeta dependências
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     */
    public function __construct(AutenticacaoManager $autenticacaoManager)
    {
        $this->variables['pagina'] = array('descricao' => 'Gerenciamento de usuários.');
        $this->variables['usuarios'] = $autenticacaoManager->obterTodos();
    }
}
