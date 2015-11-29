<?php
namespace Compra\Status;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Sql\Select;

class StatusRepository
{

    private $tableGateway;
    private $tableName = 'compra_status';
    private $columns = array('id', 'nome', 'label_type');
    
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
     * @return StatusRepository
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
     * @param StatusHydrator $hydrator            
     * @param Status $prototipo            
     */
    public function __construct(AdapterInterface $dbAdapter, StatusHydrator $hydrator, Status $prototipo)
    {
        $this->setTableGatway(new TableGateway($this->tableName, $dbAdapter, null, new HydratingResultSet($hydrator, $prototipo)));
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
    }

    /**
     * Encontra um iterador com todos os status de compras no BD
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
     * Encontra o status de compra no BD
     *
     * @param int $id
     * @return Status
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
     * Encontra o status de compra no BD
     *
     * @param string $nome
     * @return Status
     */
    public function findByNome($nome)
    {
        $rowset = $this->getTableGateway()->select(function (Select $select) use($nome) {
            $select->columns($this->columns)
            ->where(array(
                'nome' => $nome
            ))
            ->limit(1);
        });
        $row = $rowset->current();
        if (! $row) {
            return NULL;
        }
        return $row;
    }
}