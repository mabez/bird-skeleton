<?php
namespace Admin\Model;

use Admin\Entity\Mensagem;

abstract class AbstractAdminModel
{
    protected $mensagens = array();
    
    public function getMensagens()
    {
        return $this->mensagens;
    }

    protected function setMensagens($mensagens)
    {
        $this->mensagens = $mensagens;
        return $this;
    }
    
    protected function addMessagem(Mensagem $mensagem) {
        $this->mensagens[] = $mensagem;
        return $this;
    }
    
    /**
     * Salva uma entidade a partir de um array
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public abstract function saveArray($array);

    /**
     * Remove uma entidade a partir de um id
     * @param mixed $id a da instancia a ser removida
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public abstract function remove($id);
}
