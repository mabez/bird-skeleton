<?php
namespace Pagamento;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Sql\Expression;

class PagamentoRepository
{

    private $tableGateway;

    private $tableName = 'pagamento';
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
     * @return PagamentoRepository
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
     * @param PagamentoHydrator $hydrator            
     * @param Pagamento $prototipo            
     */
    public function __construct(AdapterInterface $dbAdapter, PagamentoHydrator $hydrator, Pagamento $prototipo)
    {
        $this->setTableGatway(new TableGateway($this->tableName, $dbAdapter, null, new HydratingResultSet($hydrator, $prototipo)));
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
    }

    /**
     * Salva o pagamento passado por parâmetro no BD
     * 
     * @param Pagamento $pagamento            
     */
    public function save(Pagamento $pagamento)
    {
        $id = $pagamento->getId();
        if ($id == 0) {
            $this->getTableGateway()->insert($pagamento->toArray());
            $pagamento->setId($this->getTableGateway()->lastInsertValue);
            
            return $pagamento;
        }
    }

    /**
     * Encontra um iterador com todos os pagamentos no BD
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
     * Encontra um iterador com todos os pagamentos relacionadas a uma autenticacao no BD
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
    
    /**
     * Encontra  somados valores de todos os pagamentos no BD
     */
    public function sumValor()
    {
        $tableGateway = new TableGateway($this->tableName, $this->dbAdapter);
        $sql = $tableGateway->getSql();
        $select = $sql->select()->columns(array('sum' => new Expression('SUM(valor)')));
        return $tableGateway->selectWith($select)->current();
    }
}