<?php
namespace Login\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Login\Entity\Login as Entity;
use Login\Mapper\Hydrator\Login as Hydrator;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;

 
class Login
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
    public function findByUsuarioSenha($usuario, $senha)
    {
         $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('login')
            ->where(
                array(
                    'usuario' => $usuario,
                    'senha' => $senha
                )
            )
            ->limit(1);

         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();

         if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
             return $this->hydrator->hydrate($result->current(), $this->prototype);
         }
         
         return NULL;
    }
}
