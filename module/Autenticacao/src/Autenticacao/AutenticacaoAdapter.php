<?php
namespace Autenticacao;

use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Autenticacao\Identificacao\IdentificacaoGenerator;
use Autenticacao\Perfil\PerfilManager;


/**
 * Adapter para autenticação de login
 */
class AutenticacaoAdapter extends AbstractAdapter implements AdapterInterface
{
    private $key = 'bird-skeleton-login';
    private $autenticacao;
    private $repository;
    private $identificacaoGenerator;
    private $perfilManager;
    private $senhaIsCrypted = false;

    /**
     * Preenche usuário e senha para autenticação
     * @param string $usuario
     * @param string $senha
     * @param Autenticacao\Identificacao\Identificacao $identificacao
     */
    function __construct(AutenticacaoRepository $repository, IdentificacaoGenerator $identificacaoGenerator, PerfilManager $perfilManager)
    {
        $this->repository = $repository;
        $this->identificacaoGenerator = $identificacaoGenerator;
        $this->perfilManager = $perfilManager;
    }

    /**
     * @param Autenticacao $autenticacao
     */
    public function setAutenticacao(Autenticacao $autenticacao)
    {
        $this->senhaIsCrypted = false;
        $this->autenticacao = $autenticacao;
        return $this;
    }

    /**
     * Efetua a autenticação
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface Se a autenticação não acontecer
     */
    public function authenticate()
    {
        $autenticacao = $this->obterAutenticacaoCompleta($this->autenticacao->getUsuario(), $this->getCryptedSenha());
        if ($autenticacao instanceof Autenticacao) {

            $this->setIdentity($this->identificacaoGenerator->generate($autenticacao));

            return new Result(Result::SUCCESS, $this->getIdentity());
        }

        return new Result(Result::FAILURE, $this->getIdentity());
    }

    /**
     * Retorna a senha criptografada
     * @return string
     */
    private function getCryptedSenha()
    {
        if (!$this->senhaIsCrypted) {
            $this->senhaIsCrypted = true;
            return password_hash($this->autenticacao->getSenha(), PASSWORD_BCRYPT, array('salt'=>sha1($this->key)));
        }

        return $this->autenticacao->getSenha();
    }

    /**
     * Retorna um objeto autenticacao preparado para salvar no banco
     */
    public function getPreparedAutenticacao()
    {
        return $this->autenticacao->setSenha($this->getCryptedSenha());
    }

    /**
     *
     * @return PerfilManager
     */
    private function getPerfilManager()
    {
        return $this->perfilManager;
    }

    /**
     *
     * @return AutenticacaoRepository
     */
    private function getRepository()
    {
        return $this->repository;
    }

    /**
     * Econtra Autenticacao trazendo todos os relacionamentos a partir do usuario e senha
     * @param string $usuario
     * @param string $senha
     * @return Autenticacao
     */
    private function obterAutenticacaoCompleta($usuario, $senha)
    {
        $autenticacao = $this->getRepository()->findByUsuarioSenha($usuario, $senha);
        return $autenticacao ? $autenticacao->setPerfil($this->getPerfilManager()->obterPerfil($autenticacao->getPerfilId())): null;
    }

}
