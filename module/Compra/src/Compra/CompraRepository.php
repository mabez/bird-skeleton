<?php
namespace Compra;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;

class CompraRepository
{

    private $tableGateway;

    private $tableName = 'compra';
    private $dbAdapter;
    private $hydrator;
    private $prototipo;

    /**
     * Obtem o TableGatwey
     * 
     * @return \Zend\Db\TableGateway\TableGateway
     */
    private function getTableGateway()
    {
        return $this->tableGateway;
    }

    /**
     * Insere o TableGatway
     * 
     * @param \Zend\Db\TableGateway\TableGateway $tableGateway            
     * @return CompraRepository
     */
    private function setTableGatway(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
        return $this;
    }

    /**
     * Injeta dependências
     * 
     * @param \Zend\Db\Adapter\AdapterInterface $dbAdapter            
     * @param CompraHydrator $hydrator            
     * @param Compra $prototipo            
     */
    public function __construct(AdapterInterface $dbAdapter, CompraHydrator $hydrator, Compra $prototipo)
    {
        $this->setTableGatway(new TableGateway($this->tableName, $dbAdapter, null, new HydratingResultSet($hydrator, $prototipo)));
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
    }

    /**
     * Salva a compra passado por parâmetro no BD
     * 
     * @param Compra $compra            
     */
    public function save(Compra $compra)
    {
        $id = $compra->getId();
        if ($id == 0) {
            $this->getTableGateway()->insert($compra->toArray());
            $compra->setId($this->getTableGateway()->lastInsertValue);
            
            return $compra;
        }
    }

    /**
     * Encontra um iterador com todos as compras no BD
     * @return Iterator
     */
    public function findAll()
    {
        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select($this->tableName);
    
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, $this->prototipo);
    
            return $resultSet->initialize($result);
        }
    
        return array();
    }
    
    /**
     * Encontra um iterador com todos as compras relacionadas a uma autenticacao no BD
     * @param int $autenticacaoId
     * @return Iterator
     */
    public function findAllByAutenticacaoId($autenticacaoId)
    {
        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select($this->tableName)->where(array('autenticacao_id' => $autenticacaoId));
        
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, $this->prototipo);
        
            return $resultSet->initialize($result);
        }
        
        return array();
    }
}