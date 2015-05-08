<?php
namespace Application\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Application\Entity\Site as Entity;
use Application\Mapper\Hydrator\Site as Hydrator;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;


class Site
{
    protected $dbAdapter;
    protected $hydrator;
    protected $prototype;

    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = new Hydrator();
        $this->prototype = new Entity();
    }
    
    /**
     * Encontra o objeto com as informações do site no BD
     * @return \Application\Entity\Site
     */
    public function find()
    {
        $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('site');
         $select->limit(1);

         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();

         if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
             return $this->hydrator->hydrate($result->current(), $this->prototype);
         }
         
         return array();
    }
}