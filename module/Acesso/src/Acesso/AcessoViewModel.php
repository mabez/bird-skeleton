<?php
namespace Acesso;

use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página do site
 */
class AcessoViewModel extends ViewModel
{

    private $acesso;

    /**
     * Injeta dependências
     * @param Acesso $acesso
     */
    public function __construct(Acesso $acesso)
    {
        $this->acesso = $acesso;
    }
    
    /**
     * Verifica se o usuário autenticado pode acessar o recurso
     * @param string $resource
     * @return boolean
     */
    public function podeAcessar($resource)
    {
        return $this->acesso->isRoleAtualAllowed($resource);
    }
}
