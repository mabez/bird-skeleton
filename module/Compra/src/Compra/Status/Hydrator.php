<?php
namespace Compra\Status;

use Zend\Hydrator\HydratorInterface;

class Hydrator implements HydratorInterface
{
    /**
     * Converte um objeto Status em vetor
     * @param Status $object objeto
     * @return array
     */
    public function extract($object)
    {
        if ($object instanceof Status) {
            return $object->toArray();
        }
    }

    /**
     * Converte um vetor em um objeto Status
     * @param array $data vetor
     * @param Status $object (prototipo)
     * @return Status
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Status) {
            return $object->exchangeArray($data);
        }
    }
}