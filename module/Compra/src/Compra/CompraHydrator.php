<?php
namespace Compra;

use Zend\Hydrator\HydratorInterface;

class CompraHydrator implements HydratorInterface
{
    /**
     * Converte um objeto Compra em vetor
     * @param Compra $object objeto
     * @return array
     */
    public function extract($object)
    {
        if ($object instanceof Compra) {
            return $object->toArray();
        }
    }

    /**
     * Converte um vetor em um objeto compra
     * @param array $data vetor
     * @param Compra $object (prototipo)
     * @return Compra
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Compra) {
            return $object->exchangeArray($data);
        }
    }
}