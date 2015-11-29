<?php
namespace Produto;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class ProdutoRepository
{

    private $tableGateway;

    private $tableName = 'produto';

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
     * @param ProdutoHydrator $hydrator            
     * @param Produto $prototipo            
     */
    public function __construct(AdapterInterface $dbAdapter, ProdutoHydrator $hydrator, Produto $prototipo)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->prototipo = $prototipo;
    }

    /**
     * Encontra um iterador com todos os produtos no BD
     *
     * @return Iterator
     */
    public function findAll()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select($this->tableName);
        
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, $this->prototipo);
            
            return $resultSet->initialize($result);
        }
        
        return array();
    }

    /**
     * Encontra o produto no BD
     *
     * @param int $id
     * @return Produto
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
     * Salva o produto passado por parâmetro no BD
     *
     * @param Produto $produto            
     */
    public function save(Produto $produto)
    {
        $id = $produto->getId();
        $dados = $produto->toArray();
        if (!$id) {
            unset($dados['id']);
            $this->getTableGateway()->insert($dados);
            $produto->setId($this->getTableGateway()->lastInsertValue);
            return $produto;
        } elseif ($this->findById($id)) {
            $this->getTableGateway()->update($dados, array(
                'id' => $id
            ));
            return $produto;
        } else {
            return NULL;
        }
    }

    /**
     * Remove no BD o produto com o id passado por parâmetro
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