<?php
namespace Notificacao;

trait NotificacoesContainerTrait
{
    protected $notificacoes= array();

    /**
     * @return Ambigous <Notificacao>
     */
    public function getNotificacoes()
    {
        $notificacoes = $this->notificacoes;
        $this->notificacoes = array();
        return $notificacoes;
    }

    /**
     * @param array $notificacoes
     * @return NotificacoesContainerTrait
     */
    protected function setNotificacoes($notificacoes)
    {
        $this->notificacoes = $notificacoes;
        return $this;
    }

    /**
     * @param Notificacao $notificacao
     * @return NotificacoesContainerTrait
     */
    protected function addNotificacao(Notificacao $notificacao) {
        $this->notificacoes[] = $notificacao;
        return $this;
    }
}
