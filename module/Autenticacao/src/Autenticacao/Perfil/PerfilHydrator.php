<?php
namespace Autenticacao\Perfil;

use Zend\Stdlib\Hydrator\HydratorInterface;

class PerfilHydrator implements HydratorInterface
{
    /**
     * Converte um objeto perfil em vetor
     * @param Perfil $object objeto
     * @return array
     */
    public function extract($object)
    {
        if ($object instanceof Perfil) {
            return $object->toArray();
        }
    }

    /**
     * Converte um vetor em um objeto perfil
     * @param array $data vetor
     * @param Perfil $object (prototipo)
     * @return Perfil
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Perfil) {
            return $object->exchangeArray($data);
        }
    }
}