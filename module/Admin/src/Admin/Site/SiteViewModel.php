<?php
namespace Admin\Site;

use Site\SiteManager;
use Application\Site\Mensagem;
use Site\Site;
use Admin\AdminViewModel;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class SiteViewModel extends AdminViewModel
{

    const MESSAGE_INTERNAL_ERROR = "Ocorreu um erro. Tente mais tarde.";
    const MESSAGE_SUCCESS = "As informações foram salvas.";
    
    private $siteManager;
    
    private $form;
    
    /**
     * Injeta dependencias
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param SiteForm $form
     * @param mixed $cacheSiteArray
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, SiteForm $form, $cacheSiteArray = array())
    {
        parent::__construct($siteManager, $authentication, $uri);
        $this->siteManager = $siteManager;
        $this->form = $form;
        
        $site = new Site();
        $site->exchangeArray($cacheSiteArray);
        $this->variables['pagina'] = array('descricao' => 'Configurações do site.');
        $this->variables['formulario'] = $form->setEntity($site)->prepare();
    }

    /**
     * Obtem o formulario do site
     * @return SiteForm
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Salva um site a partir de um array
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $site = new Site();
            $site->exchangeArray($array);
            $this->siteManager->salvar($site);
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, self::MESSAGE_SUCCESS));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR));
        }
        return $this->getMensagens();
    }
}
