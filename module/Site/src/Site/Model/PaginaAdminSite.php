<?php
namespace Site\Model;

use Site\Service\Site as Service;
use Site\Entity\Site as Entity;
use Admin\Entity\Mensagem;
use Admin\Model\AbstractAdminModel;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class PaginaAdminSite extends AbstractAdminModel
{

    const MESSAGE_INTERNAL_ERROR = "Ocorreu um erro. Tente mais tarde.";
    const MESSAGE_SUCCESS = "As informações foram salvas.";
    
    private $service;
    
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    
    private function getService()
    {
        return $this->service;
    }
    
    /**
     * Obtem a um array com a estrutura da página de administração de informações do site
     * @return array
     */
    public function getArray()
    {
        return array('pagina' => array('descricao' => 'Configurações do site.'));
    }
    
    /**
     * Salva um site a partir de um array
     * @see \Admin\Model\AbstractAdminModel::saveArray()
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $entity = new Entity();
            $entity->exchangeArray($array);
            $this->getService()->salvar($entity);
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, self::MESSAGE_SUCCESS));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR));
        }
        return $this->getMensagens();
    }
    
    public function remove($id)
    {
        return false;
    }
}
