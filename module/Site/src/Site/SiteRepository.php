<?php

namespace Site;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;

class SiteRepository
{

    private $tableGatway;
    private $tableName = 'site';
    private $columns = array('id', 'nome', 'logo', 'intro', 'copyright');

    /**
     * Obtem o TableGatwey
     * @return \Zend\Db\TableGateway\TableGateway
     */
    private function getTableGateway()
    {
        return $this->tableGateway;
    }
    
    /**
     * Insere o TableGatway
     * @param \Zend\Db\TableGateway\TableGateway $tableGateway
     * @return SiteRepository
     */
    private function setTableGatway(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
        return $this;
    }
    
    /**
     * Injeta dependências
     * @param AdapterInterface $dbAdapter
     */
    public function __construct(AdapterInterface $dbAdapter)
    {
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Site());
        $tableGatway = new TableGateway($this->tableName, $dbAdapter, null, $resultSetPrototype);
        $this->setTableGatway($tableGatway);
    }

    /**
     * Encontra o objeto com as informações do primeiro site no BD
     * @return Site
     */
    public function findFirst()
    {
        $rowset = $this->getTableGateway()
            ->select(
                function(Select $select) {
                    $select->columns($this->columns);
                    $select->limit(1);
                    $select->order('id asc');
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
     * @return Site
     */
    public function findById($id)
    {
        $rowset = $this->getTableGateway()
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

    /**
     * Salva a entidade passada por parâmetro
     * @param Site $site
     */
    public function save(Site $site)
    {
        $id = $site->getId();
        if ($id == 0) {
            return $this->getTableGateway()->insert($site->toArray());
        } elseif ($this->findById($id)) {
            return $this->getTableGateway()->update($site->toArray(), array("id" => $id));
        } else {
            return NULL;
        }
    }
}
