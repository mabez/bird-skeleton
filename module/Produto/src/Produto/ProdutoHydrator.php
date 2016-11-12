<?php
namespace Produto;

use Zend\Hydrator\HydratorInterface;

class ProdutoHydrator implements HydratorInterface
{
    /**
     * Converte um objeto produto em vetor
     * @param produto $object objeto
     * @return array
     */
    public function extract($object)
    {
        return $object->toArray();
    }

    /**
     * Converte um vetor em um objeto produto
     * @param array $data vetor
     * @param produto $object (prototipo)
     * @return produto
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Produto) {
            return $object->exchangeArray($data);
        }
    }
}