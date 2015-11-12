<?php
namespace Admin\Anuncio;

use Anuncio\AnuncioManager;
use Site\SiteManager;
use Anuncio\Anuncio;
use Admin\AdminViewModel;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;
use Application\Site\Mensagem;

/**
 * Gerador da estrutura da página de administração de informações do anuncio
 */
class ModificarAnuncioViewModel extends AdminViewModel
{
    const MESSAGE_UPDATE_SUCCESS = 'Anuncio #%s modificado com sucesso!';
    const MESSAGE_INSERT_SUCCESS = 'Anuncio #%s incluído com sucesso!';
    const MESSAGE_REMOVE_SUCCESS = 'Anuncio #%s removido com sucesso!';
    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao modificar o anúncio #%s!';
    
    private $anuncioManager;
    protected $form;
    
    /**
     * Injeta as dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param \Anuncio\AnuncioManager $anuncioManager
     * @param AnuncioForm $form
     * @param mixed $params
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, AnuncioManager $anuncioManager, AnuncioForm $form, $params = array())
    {
        parent::__construct($siteManager, $authentication, $uri);
        extract($params);
        if (!isset($anuncioId)) $anuncioId = null;
        if (!isset($redirect)) $redirect = null;
        
        $anuncio = $anuncioManager->getAnuncio($anuncioId);
        $isNew = false;
        if (!($anuncio instanceof Anuncio)) {
            $anuncio = new Anuncio();
            $isNew = true;
        }

        $this->variables['pagina'] = array('descricao' => $this->getDescricao($anuncioId));
        $this->variables['formulario'] = $form->setEntity($anuncio)->setNew($isNew)->setRedirect($redirect)->prepare();
        $this->variables['routeRedirect'] = $redirect;
        $this->anuncioManager = $anuncioManager;
        $this->form = $form;
    }

    /**
     * Obtem a descrição da página
     * @param string $id do anuncio que está sendo modificado (opcional)
     */
    private function getDescricao($id = null)
    {
        if ($id) {
            return 'Modificar o anúncio #'.$id;
        }
        return 'Incluir um anúncio';
    }


    /**
     * Salva um anuncio a partir de um array
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $anuncio = new Anuncio();
            $anuncio->exchangeArray($array);
    
            $id = $anuncio->getId();
            if ($id == 0) {
                $messageSuccess = self::MESSAGE_INSERT_SUCCESS;
            } else {
                $messageSuccess = self::MESSAGE_UPDATE_SUCCESS;
            }
    
            $anuncio = $this->anuncioManager->salvar($anuncio);
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, $messageSuccess, array($anuncio->getId())));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array($id)));
        }
        
        return true;
    }

    /**
     * Remove um anuncio a partir de um id
     * @param mixed $id a da instancia a ser removida
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function remove($id)
    {
        try {
            $anuncio = new Anuncio();
            $anuncio->setId($id);
    
            $this->anuncioManager->remover($anuncio);
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, self::MESSAGE_REMOVE_SUCCESS, array($id)));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array($id)));
        }
        return $this->getMensagens();
    }

    public function getForm()
    {
        return $this->form;
    }
}
