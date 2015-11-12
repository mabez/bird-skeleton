<?php
namespace Consumidor\Compra;

use Application\Site\SiteViewModel;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;
use Compra\CompraManager;
use Compra\Compra;
use Application\Site\Mensagem;

/**
 * Gerador da estrutura da página de anúncios
 */
class CompraViewModel extends SiteViewModel
{

    const MESSAGE_INSERT_SUCCESS = 'A compra do item #%d foi efetuada com sucesso!';

    const MESSAGE_INTERNAL_ERROR = 'A compra do item #%d não aconteceu!';

    private $compraManager;
    private $form;

    /**
     * Injeta dependências
     * 
     * @param \Site\SiteManager $siteManager            
     * @param \Zend\Authentication\AuthenticationService $autenticacao            
     * @param \Zend\Uri\Uri $uri            
     * @param \Anuncio\AnuncioManager $compraManager            
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $autenticacao, Uri $uri, CompraManager $compraManager, CompraForm $form)
    {
        parent::__construct($siteManager, $autenticacao, $uri);
        $this->compraManager = $compraManager;
        $this->form = $form;
    }

    /**
     * Salva uma compra a partir de um array
     * 
     * @param array $array
     *            a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $compra = new Compra();
            $compra->exchangeArray($array);
            $compra = $this->compraManager->salvar($compra);
            
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, self::MESSAGE_INSERT_SUCCESS, array(
                $compra->getAnuncioId()
            )));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array(
                $compra->getAnuncioId()
            )));
        }
        
        return true;
    }
    
    /**
     * @return CompraForm
     */
    public function getForm()
    {
        return $this->form;
    }
}
