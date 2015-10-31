<?php
namespace Login;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;

class LoginRepository
{

    protected $dbAdapter;

    protected $hydrator;

    protected $prototipo;

    /**
     * Injeta depenências
     * @param \Zend\Db\Adapter\AdapterInterface $dbAdapter
     * @param LoginHydrator $hydrator
     * @param Login $prototipo
     */
    public function __construct(AdapterInterface $dbAdapter, LoginHydrator $hydrator, Login $prototipo)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
    }

    /**
     * Encontra um iterador com todos os anuncios no BD
     * @return Iterator
     */
    public function findByUsuarioSenha($usuario, $senha)
    {
        $authAdapter = new AuthAdapter($this->dbAdapter, 'login', 'usuario', 'senha');
        $authAdapter->setIdentity($usuario)->setCredential($senha);
        $result = $authAdapter->authenticate();
        if ($result->isValid()) {
            return $this->hydrator->hydrate((array) $authAdapter->getResultRowObject(), $this->prototipo);
        }

        return NULL;
    }
}
