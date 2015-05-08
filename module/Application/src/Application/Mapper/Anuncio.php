<?php
namespace Application\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Application\Entity\Anuncio as Entity;
use Application\Mapper\Hydrator\Anuncio as Hydrator;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;

 
class Anuncio
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
}