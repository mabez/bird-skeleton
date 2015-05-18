<?php
namespace Anuncio\Model;

use Anuncio\Service\Anuncio as ServiceAnuncio;
use Anuncio\Entity\Anuncio as Entity;
use Admin\Model\AbstractAdminModel;
use Admin\Entity\Mensagem;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class PaginaAdminAnuncios extends AbstractAdminModel
{
    const MESSAGE_UPDATE_SUCCESS = 'Anuncio #%s modificado com sucesso!';
    const MESSAGE_INSERT_SUCCESS = 'Anuncio #%s incluído com sucesso!';
    const MESSAGE_REMOVE_SUCCESS = 'Anuncio #%s removido com sucesso!';
    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao modificar o anúncio #%s!';
    
    private $serviceAnuncio;
    
    /**
     * Injeta dependências
     * @param \Anuncio\Service\Anuncio $serviceAnuncio
     */
    public function __construct(ServiceAnuncio $serviceAnuncio)
    {
        $this->serviceAnuncio = $serviceAnuncio;
    }
    
    /**
     * @return \Anuncio\Service\Anuncio
     */
    private function getServiceAnuncio()
    {
        return $this->serviceAnuncio;
    }

    /**
     * Obtem a um array com a estrutura da página de administração de informações do site
     * @return array
     */
    public function getArray()
    {
        return array(
            'pagina' => array('descricao' => 'Gerenciamento de anúncios.'),
            'anuncios' => $this->getServiceAnuncio()->getTodosAnuncios()
        );
    }
    
    /**
     * Salva um anuncio a partir de um array
     * @see \Admin\Model\AbstractAdminModel::saveArray()
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $entity = new Entity();
            $entity->exchangeArray($array);
            
            $id = $entity->getId();
            if ($id == 0) {
                $messageSuccess = self::MESSAGE_INSERT_SUCCESS;
            } else {
                $messageSuccess = self::MESSAGE_UPDATE_SUCCESS;
            }
            
            $this->getServiceAnuncio()->salvar($entity);
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, $messageSuccess, array($id)));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array($id)));
        }
        return $this->getMensagens();
    }
    
    /**
     * Remove um anuncio a partir de um id
     * @param mixed $id a da instancia a ser removida
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function remove($id)
    {
        try {
            $entity = new Entity();
            $entity->setId($id);
            
            $this->getServiceAnuncio()->remover($entity);
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, self::MESSAGE_REMOVE_SUCCESS, array($id)));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array($id)));
        }
        return $this->getMensagens();
    }
}
