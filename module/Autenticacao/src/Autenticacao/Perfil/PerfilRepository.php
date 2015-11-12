<?php
namespace Autenticacao\Perfil;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class PerfilRepository
{

    private $tableName = 'perfil';

    private $columns = array(
        'id',
        'nome'
    );

    /**
     * Injeta depenências
     * 
     * @param \Zend\Db\Adapter\AdapterInterface $dbAdapter            
     * @param PerfilHydrator $hydrator            
     * @param Perfil $prototipo            
     */
    public function __construct(AdapterInterface $dbAdapter, PerfilHydrator $hydrator, Perfil $prototipo)
    {
        $this->setTableGatway(new TableGateway($this->tableName, $dbAdapter, null, new HydratingResultSet($hydrator, $prototipo)));
    }

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
     * @return PerfilRepository
     */
    private function setTableGatway(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
        return $this;
    }

    /**
     * Encontra o objeto com as informações do site no BD
     * 
     * @param int $id            
     * @return Perfil
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
     * Encontra o objeto com as informações do site no BD
     * 
     * @param string $nome            
     * @return Perfil
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
