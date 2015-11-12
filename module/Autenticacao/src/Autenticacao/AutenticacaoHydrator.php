<?php
namespace Autenticacao;

use Zend\Stdlib\Hydrator\HydratorInterface;

class AutenticacaoHydrator implements HydratorInterface
{
    /**
     * Converte um objeto anuncio em vetor
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
     * Converte um vetor em um objeto anuncio
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