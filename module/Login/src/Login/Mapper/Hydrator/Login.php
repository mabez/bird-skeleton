<?php
namespace Login\Mapper\Hydrator;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Login\Entity\Login as Entity;

class Login implements HydratorInterface
{
    /**
     * Converte um objeto anuncio em vetor
     * @param \Login\Entity\Login $object objeto
     * @return array
     */
    public function extract($object)
    {
        return $object->toArray();
    }

    /**
     * Converte um vetor em um objeto anuncio
     * @param array $data vetor
     * @param \Login\Entity\Login $object (prototipo)
     * @return \Login\Entity\Login
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Entity) {
            $object->setUsuario($data['usuario']);
            $object->setSenha($data['senha']);
            return $object;
        }
    }
}