<?php
namespace Anuncio;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

 
class AnuncioRepository
{
    private $tableGateway;
    private $tableName = 'anuncio';
    protected $dbAdapter;
    protected $hydrator;
    protected $prototipo;
    
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
     * @return AnuncioRepository
     */
    private function setTableGatway(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
        return $this;
    }

    /**
     * Injeta dependências
     * @param \Zend\Db\Adapter\AdapterInterface $dbAdapter
     * @param AnuncioHydrator $hydrator
     * @param Anuncio $prototipo
     */
    public function __construct(AdapterInterface $dbAdapter, AnuncioHydrator $hydrator, Anuncio $prototipo)
    {
        $resultSetPrototype = new ResultSet(
            ResultSet::TYPE_ARRAYOBJECT,
                new \ArrayObject(
                    array($prototipo),
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
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
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
            $resultSet = new HydratingResultSet($this->hydrator, $this->prototipo);
    
            return $resultSet->initialize($result);
        }
    
        return array();
    }

    /**
     * Encontra um objeto com o dados do anuncio no BD
     * @param int $id do anuncio
     * @return Anuncio
     */
    public function findById($id)
    {
         $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('anuncio')->where(array('id' => $id))->limit(1);

         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();
         if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
             return $this->hydrator->hydrate($result->current(), $this->prototipo);
         }
    }

    /**
     * Salva o anuncio passado por parâmetro no BD
     * @param Anuncio $anuncio
     */
    public function save(Anuncio $anuncio)
    {
        $id = $anuncio->getId();
        if ($id == 0) {
            $this->getTableGateway()->insert($anuncio->toArray());
            $anuncio->setId($this->getTableGateway()->lastInsertValue);
            return $anuncio;
        } elseif ($this->findById($id)) {
            $this->getTableGateway()->update($anuncio->toArray(), array('id' => $id));
            return $anuncio;
        } else {
            return NULL;
        }
    }

    /**
     * Remove no BD o anuncio com o id passado por parâmetro
     * @param unknown $id
     */
    public function removeById($id)
    {
        return $this->getTableGateway()->delete(array('id' => $id));
    }
}