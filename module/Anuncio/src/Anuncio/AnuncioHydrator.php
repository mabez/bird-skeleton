<?php
namespace Anuncio;

use Zend\Stdlib\Hydrator\HydratorInterface;

class AnuncioHydrator implements HydratorInterface
{
    /**
     * Converte um objeto anuncio em vetor
     * @param Anuncio $object objeto
     * @return array
     */
    public function extract($object)
    {
        return $object->toArray();
    }

    /**
     * Converte um vetor em um objeto anuncio
     * @param array $data vetor
     * @param Anuncio $object (prototipo)
     * @return Anuncio
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Anuncio) {
            return $object->exchangeArray($data);
        }
    }
}