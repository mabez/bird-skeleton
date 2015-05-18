<?php

namespace Site\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Site\Entity\Site as Entity;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;

class Site
{

    private $tableGatway;
    private $tableName = 'site';
    private $columns = array('id', 'nome', 'logo', 'intro', 'copyright');
    
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
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Entity());
        $tableGatway = new TableGateway($this->tableName, $dbAdapter, null, $resultSetPrototype);
        $this->setTableGatway($tableGatway);
    }

    /**
     * Encontra o objeto com as informações do site no BD
     * @return \Site\Entity\Site
     */
    public function find()
    {
        $rowset = $this->getTableGatway()
            ->select(
                function(Select $select) {
                    $select->columns($this->columns);
                    $select->limit(1);
                }
            );
        $row = $rowset->current();
        if (!$row) {
            return NULL;
        }
        return $row;
    }

    /**
     * Encontra o objeto com as informações do site no BD
     * @param int $id
     * @return \Site\Entity\Site
     */
    public function findById($id)
    {
        $rowset = $this->getTableGatway()
            ->select(
                function(Select $select) use ($id) {
                    $select->columns($this->columns)
                        ->where(array('id' => $id))
                        ->limit(1);
                }
            );
        $row = $rowset->current();
        if (!$row) {
            return NULL;
        }
        return $row;
    }

    public function save(Entity $entity)
    {
        $id = $entity->getId();
        if ($id == 0) {
            return $this->getTableGatway()->insert($entity->toArray());
        } elseif ($this->findById($id)) {
            return $this->getTableGatway()->update($entity->toArray(), array("id" => $id));
        } else {
            return NULL;
        }
    }
}
