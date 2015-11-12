<?php
namespace Acesso;

use Zend\View\Helper\AbstractHelper;

class AcessoViewHelper extends AbstractHelper
{
    private $acesso;

    /**
     * Verfica se o papel em sessão tem acesso para o recurso
     * @param string $resource
     */
    public function __invoke($resource)
    {
        return $this->acesso->isRoleAtualAllowed($resource);
    }

    /**
     * Injeta dependências
     * @param Acesso $acesso
     */
    public function __construct(Acesso $acesso)
    {
        $this->acesso = $acesso;
    }
}
