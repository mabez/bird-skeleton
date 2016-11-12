<?php
namespace Autenticacao;

use Zend\Hydrator\HydratorInterface;

class AutenticacaoHydrator implements HydratorInterface
{
    /**
     * Converte um objeto autenticacao em vetor
     * @param Autenticacao $object objeto
     * @return array
     */
    public function extract($object)
    {
        if ($object instanceof Autenticacao) {
            return $object->toArray();
        }
    }

    /**
     * Converte um vetor em um objeto autenticacao
     * @param array $data vetor
     * @param Autenticacao $object (prototipo)
     * @return Autenticacao
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Autenticacao) {
            return $object->exchangeArray($data);
        }
    }
}