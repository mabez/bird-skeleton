<?php
namespace Pagamento;

use Zend\Hydrator\HydratorInterface;

class PagamentoHydrator implements HydratorInterface
{
    /**
     * Converte um objeto pagamento em vetor
     * @param Pagamento $object objeto
     * @return array
     */
    public function extract($object)
    {
        if ($object instanceof Pagamento) {
            return $object->toArray();
        }
    }

    /**
     * Converte um vetor em um objeto pagamento
     * @param array $data vetor
     * @param Pagamento $object (prototipo)
     * @return Pagamento
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Pagamento) {
            return $object->exchangeArray($data);
        }
    }
}