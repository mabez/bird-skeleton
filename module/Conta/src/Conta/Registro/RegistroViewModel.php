<?php
namespace Conta\Registro;

use Autenticacao\AutenticacaoManager;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;
use Application\Site\Mensagem;
use Autenticacao\Autenticacao;
use Acesso\Acesso;
use Conta\ContaViewModel;

/**
 * Gerador da estrutura da página de administração de informações do anuncio
 */
class RegistroViewModel extends ContaViewModel
{
    const MESSAGE_UPDATE_SUCCESS = 'Dados modificados com sucesso!';
    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao salvar os dados!';
    
    private $autenticacaoManager;
    protected $form;
    
    /**
     * Injeta as dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     * @param RegistroForm $form
     * @param mixed $params
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, AutenticacaoManager $autenticacaoManager, RegistroForm $form, $params = array())
    {
        parent::__construct($siteManager, $authentication, $uri);
        extract($params);
        if (!isset($redirect)) $redirect = null;
        
        $usuario = $authentication->getIdentity();
        $this->setDescricaoPagina('Modificando meus dados.');
        $form->setEntity($usuario);
        $form->setRouteRedirect($redirect);
        $form->prepare();
        $this->variables['formulario'] = $form;
        $this->variables['routeRedirect'] = $redirect;
        $this->autenticacaoManager = $autenticacaoManager;
        $this->form = $form;
    }

    /**
     * Salva um usuário a partir de um array
     * @param array $array a ser salvo
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function saveArray($array)
    {
        try {
            $autenticacao = $this->authentication->getIdentity();
            $usuario = new Autenticacao();
            $usuario->exchangeArray($array);
            $usuario->setId($autenticacao->getId());
            $usuario->setPerfilId($autenticacao->getPerfilId());
            $usuario = $this->autenticacaoManager->salvar($usuario);
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, self::MESSAGE_UPDATE_SUCCESS, array($usuario->getId())));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR, array($usuario->getId())));
        }
        
        return true;
    }

    public function getForm()
    {
        return $this->form;
    }
}
