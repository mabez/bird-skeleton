<?php
namespace Admin;

use Zend\View\Model\ViewModel;

/**
 * Gerador da estrutura da página de admin do site
 */
class AdminViewModel extends ViewModel
{
    
    /**
     * Injeta dependências
     * @param mixed $entidadesConfig
     */
    public function __construct($entidadesConfig = array())
    {
        $this->variables['entidades'] = $entidadesConfig;
        $this->variables['pagina'] = array('descricao' => 'Selecione o que você quer gerenciar no menu abaixo.');
    }
}
