<?php
namespace Anuncio\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Anuncio\Entity\Anuncio as Entity;
use Anuncio\Mapper\Hydrator\Anuncio as Hydrator;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

 
class Anuncio
{
    private $tableGatway;
    private $tableName = 'anuncio';
    protected $dbAdapter;
    protected $hydrator;
    protected $prototype;
    
    private function getTableGatway()
    {
        return $this->tableGatway;
    }
    
    private function setTableGatway($tableGatway)
    {
        $this->tableGatway = $tableGatway;
        return $this;
    }

    public function __construct(AdapterInterface $dbAdapter)
    {
        $resultSetPrototype = new ResultSet(
            ResultSet::TYPE_ARRAYOBJECT,
                new \ArrayObject(
                    array(new Entity()),
                    \ArrayObject::ARRAY_AS_PROPS
                )
            );
        $this->setTableGatway(
            new TableGateway(
                    $this->tableName,
                    $dbAdapter,
                    null,
                    $resultSetPrototype
                )
            );
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = new Hydrator();
        $this->prototype = new Entity();
    }

    /**
     * Encontra um iterador com todos os anuncios no BD
     * @return Iterator
     */
    public function findAll()
    {
        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select('anuncio');
    
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, $this->prototype);
    
            return $resultSet->initialize($result);
        }
    
        return array();
    }

    /**
     * Encontra um objeto com o dados do anuncio no BD
     * @param int $id do anuncio
     * @return Entity
     */
    public function findById($id)
    {
         $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('anuncio')->where(array('id' => $id))->limit(1);

         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();
         if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
             return $this->hydrator->hydrate($result->current(), $this->prototype);
         }

         return null;
    }

    public function save(Entity $entity)
    {
        $id = $entity->getId();
        if ($id == 0) {
            return $this->getTableGatway()->insert($entity->toArray());
        } elseif ($this->findById($id)) {
            return $this->getTableGatway()->update($entity->toArray(), array('id' => $id));
        } else {
            return NULL;
        }
    }

    public function removeById($id)
    {
        return $this->getTableGatway()->delete(array('id' => $id));
    }
}