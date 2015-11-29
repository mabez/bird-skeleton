<?php
namespace Login\Identificacao;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;

class IdentificacaoIdViewHelper extends AbstractHelper
{
    private $authenticationService;

    /**
     * Retorna o usuario atual
     */
    public function __invoke()
    {
        return $this->authenticationService->getIdentity()->getId();
    }

    /**
     * Injeta dependências
     * @param \Zend\Authentication\AuthenticationService $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }
}
