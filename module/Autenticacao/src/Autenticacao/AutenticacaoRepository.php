<?php
namespace Autenticacao;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;

class AutenticacaoRepository
{

    protected $dbAdapter;

    protected $hydrator;

    protected $prototipo;

    private $tableName = 'autenticacao';

    private $columns = array(
        'id',
        'usuario',
        'senha',
        'perfil_id'
    );

    /**
     * Injeta depenências
     * 
     * @param \Zend\Db\Adapter\AdapterInterface $dbAdapter            
     * @param AutenticacaoHydrator $hydrator            
     * @param Autenticacao $prototipo            
     */
    public function __construct(AdapterInterface $dbAdapter, AutenticacaoHydrator $hydrator, Autenticacao $prototipo)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
    }

    /**
     * Obtem o TableGatwey
     * 
     * @return \Zend\Db\TableGateway\TableGateway
     */
    private function getTableGateway()
    {
        return new TableGateway($this->tableName, $this->dbAdapter, null, new HydratingResultSet($this->hydrator, $this->prototipo));
    }

    /**
     * Encontra a autenticação no BD
     * 
     * @param string $usuario            
     * @param string $senha            
     * @return Autenticacao
     */
    public function findByUsuarioSenha($usuario, $senha)
    {
        $authAdapter = new AuthAdapter($this->dbAdapter, $this->tableName, 'usuario', 'senha');
        $authAdapter->setIdentity($usuario)->setCredential($senha);
        $result = $authAdapter->authenticate();
        if ($result->isValid()) {
            return $this->hydrator->hydrate((array) $authAdapter->getResultRowObject(), $this->prototipo);
        }
        
        return NULL;
    }

    /**
     * Encontra a autenticação no BD
     * 
     * @param int $id            
     * @return Autenticacao
     */
    public function findById($id)
    {
        $rowset = $this->getTableGateway()->select(function (Select $select) use($id) {
            $select->columns($this->columns)
                ->where(array(
                'id' => $id
            ))
                ->limit(1);
        });
        $row = $rowset->current();
        if (! $row) {
            return NULL;
        }
        return $row;
    }

    /**
     * Salva a Autenticacao passada por parâmetro no BD
     * 
     * @param Autenticacao $autenticacao            
     */
    public function save(Autenticacao $autenticacao)
    {
        $id = $autenticacao->getId();
        if ($id == 0) {
            $this->getTableGateway()->insert($autenticacao->toArray());
            $autenticacao->setId($this->getTableGateway()->lastInsertValue);
            return $autenticacao;
        } elseif ($this->findById($id)) {
            $this->getTableGateway()->update($autenticacao->toArray(), array(
                'id' => $id
            ));
            return $autenticacao;
        } else {
            return NULL;
        }
    }

    /**
     * Encontra um iterador com todos as autenticacoes no BD
     *
     * @return Iterator
     */
    public function findAll()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('login');
        
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, $this->prototipo);
            
            return $resultSet->initialize($result);
        }
        
        return array();
    }

    /**
     * Remove no BD a autenticacao com o id passado por parâmetro
     *
     * @param int $id            
     */
    public function removeById($id)
    {
        return $this->getTableGateway()->delete(array(
            'id' => $id
        ));
    }
}
