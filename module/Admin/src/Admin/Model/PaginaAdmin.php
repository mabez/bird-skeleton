<?php
namespace Admin\Model;

/**
 * Gerador da estrutura da página de admin do site
 */
class PaginaAdmin
{
    protected $entidadesConfig;

    public function __construct($entidadesConfig = array())
    {
        $this->entidadesConfig = $entidadesConfig;
    }
    /**
     * Obtem a um array com a estrutura da página de admin do site
     * @return array
     */
    public function getArray()
    {
        return array(
            'pagina' => array('descricao' => 'Selecione o que você quer gerenciar no menu abaixo.'),
            'entidades' => $this->entidadesConfig
        );
    }
}
