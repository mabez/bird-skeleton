<?php
namespace Login;

use Zend\Stdlib\Hydrator\HydratorInterface;

class LoginHydrator implements HydratorInterface
{
    /**
     * Converte um objeto anuncio em vetor
     * @param Login $object objeto
     * @return array
     */
    public function extract($object)
    {
        return $object->toArray();
    }

    /**
     * Converte um vetor em um objeto anuncio
     * @param array $data vetor
     * @param Login $object (prototipo)
     * @return Login
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Login) {
            $object->setUsuario($data['usuario']);
            $object->setSenha($data['senha']);
            return $object;
        }
    }
}