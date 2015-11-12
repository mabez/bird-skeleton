<?php
namespace Login\Registrar;

use Autenticacao\AutenticacaoManager;
use Application\Site\SiteViewModel;
use Site\SiteManager;
use Zend\Authentication\AuthenticationService;
use Zend\Uri\Uri;
use Autenticacao\Autenticacao;
use Application\Site\Mensagem;
use Acesso\Acesso;

/**
 * Gerador da estrutura da página de login
 */
class RegistrarViewModel extends SiteViewModel
{

    const MESSAGE_INTERNAL_ERROR = 'Ocorreu um erro ao regitrar uma conta!';
    const MESSAGE_INSERT_SUCCESS = 'O login foi registrado com sucesso!';
    
    private $autenticacaoManager;
    private $form;

    /**
     * Injeta dependências
     * @param \Site\SiteManager $siteManager
     * @param \Zend\Authentication\AuthenticationService $authentication
     * @param \Zend\Uri\Uri $uri
     * @param \Autenticacao\AutenticacaoManager $autenticacaoManager
     * @param RegistrarForm $form
     */
    public function __construct(SiteManager $siteManager, AuthenticationService $authentication, Uri $uri, AutenticacaoManager $autenticacaoManager, RegistrarForm $form)
    {
        parent::__construct($siteManager, $authentication, $uri);
        $this->autenticacaoManager = $autenticacaoManager;
        $this->form = $form;
        $this->variables['formulario'] = $form;
    }

    /**
     * Obtem o formulário de registrar login
     * @return RegistrarForm
     */
    public function getFormulario($routeRedirect = null)
    {
        return $this->form->setRouteRedirect($routeRedirect);
    }

    /**
     * Salva um login a partir do formulario
     * @return array contendo as mensagens de sucesso ou erro.
     */
    public function save()
    {
        try {
            $autenticacao = new Autenticacao();
            $autenticacao->exchangeArray($this->form->getData());
            $perfilDefault = $this->autenticacaoManager->getPerfilManager()->obterPerfilByNome(Acesso::getDefaultRole());
            $autenticacao = $this->autenticacaoManager->salvar(
                $autenticacao->setPerfilId($perfilDefault->getId())
                    ->setPerfil($perfilDefault)
            );
            $this->addMessagem(new Mensagem(Mensagem::TIPO_SUCESSO, self::MESSAGE_INSERT_SUCCESS));
        } catch (\Exception $e) {
            $this->addMessagem(new Mensagem(Mensagem::TIPO_ERRO, self::MESSAGE_INTERNAL_ERROR));
        }
        return $this->getMensagens();
    }
}
