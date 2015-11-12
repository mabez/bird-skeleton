<?php
namespace Anuncio;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class AnuncioRepository
{

    private $tableGateway;

    private $tableName = 'anuncio';

    protected $dbAdapter;

    protected $hydrator;

    protected $prototipo;

    private $columns = array(
        'id',
        'titulo',
        'imagem',
        'descricao',
        'preco'
    );
    
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
     * Injeta dependências
     *
     * @param \Zend\Db\Adapter\AdapterInterface $dbAdapter            
     * @param AnuncioHydrator $hydrator            
     * @param Anuncio $prototipo            
     */
    public function __construct(AdapterInterface $dbAdapter, AnuncioHydrator $hydrator, Anuncio $prototipo)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
    }

    /**
     * Encontra um iterador com todos os anuncios no BD
     *
     * @return Iterator
     */
    public function findAll()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select('anuncio');
        
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, $this->prototipo);
            
            return $resultSet->initialize($result);
        }
        
        return array();
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
     * Salva o anuncio passado por parâmetro no BD
     *
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
            $this->getTableGateway()->update($anuncio->toArray(), array(
                'id' => $id
            ));
            return $anuncio;
        } else {
            return NULL;
        }
    }

    /**
     * Remove no BD o anuncio com o id passado por parâmetro
     *
     * @param unknown $id            
     */
    public function removeById($id)
    {
        return $this->getTableGateway()->delete(array(
            'id' => $id
        ));
    }
}