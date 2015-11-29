<?php
namespace Notificacao;

trait FlashMessagesContainerTrait
{
    /**
     * @param array $notificacoes
     *            com lista de Notificacao ou lista de strings
     */
    protected function setFlashMessagesFromNotificacoes($notificacoes)
    {
        $tipoAlerta = Notificacao::TIPO_ALERTA;
        $tipoErro = Notificacao::TIPO_ERRO;
        $tipoInformacao = Notificacao::TIPO_INFORMACAO;
        $tipoSucesso = Notificacao::TIPO_SUCESSO;
        
        foreach ($notificacoes as $notificacao) {
            if ($notificacao instanceof Notificacao) {
                switch ($notificacao->getTipo()) {
                    case $tipoAlerta:
                        $this->flashMessenger()->addWarningMessage($notificacao->getTexto());
                        break;
                    case $tipoErro:
                        $this->flashMessenger()->addErrorMessage($notificacao->getTexto());
                        break;
                    case $tipoInformacao:
                        $this->flashMessenger()->addInfoMessage($notificacao->getTexto());
                        break;
                    case $tipoSucesso:
                        $this->flashMessenger()->addSuccessMessage($notificacao->getTexto());
                        break;
                    default:
                        break;
                }
            } else {
                $this->flashMessenger()->addErrorMessage($notificacao);
            }
        }
    }
}
