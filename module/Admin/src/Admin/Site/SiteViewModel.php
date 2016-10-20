<?php
namespace Admin\Site;

use Site\SiteManager;
use Site\Site;
use Notificacao\Notificacao;
use Notificacao\NotificacoesContainerTrait;
use Zend\Session\Container;
use Acesso\AcessoViewModel;
use Acesso\Acesso;

/**
 * Gerador da estrutura da página de administração de informações do site
 */
class SiteViewModel extends AcessoViewModel
{
    use NotificacoesContainerTrait;

    const MESSAGE_INTERNAL_ERROR = "Ocorreu um erro. Tente mais tarde.";
    const MESSAGE_SUCCESS = "As informações foram salvas.";

    private $siteManager;

    private $form;

    private $cache;

    /**
     * Injeta dependencias
     * @param \Acesso\Acesso
     * @param \Site\SiteManager $siteManager
     * @param SiteForm $form
     * @param mixed $cacheSiteArray
     */
    public function __construct(Acesso $acesso, SiteManager $siteManager, SiteForm $form, Container $cache)
    {
        parent::__construct($acesso);
        $this->siteManager = $siteManager;
        $this->form = $form;

        $site =  $cache->offsetExists('objeto') ? $cache->offsetGet('objeto') : new Site();
        $this->cache = $cache;
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
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_SUCESSO, self::MESSAGE_SUCCESS));
            $this->cache->offsetSet('objeto', $site);
        } catch (\Exception $e) {
            $this->addNotificacao(new Notificacao(Notificacao::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR));
        }

        return true;
    }
}
