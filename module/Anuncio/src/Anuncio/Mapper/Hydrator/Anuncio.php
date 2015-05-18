<?php
namespace Anuncio\Mapper\Hydrator;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Anuncio\Entity\Anuncio as Entity;

class Anuncio implements HydratorInterface
{
    /**
     * Converte um objeto anuncio em vetor
     * @param \Anuncio\Entity\Anuncio $object objeto
     * @return array
     */
    public function extract($object)
    {
        return $object->toArray();
    }

    /**
     * Converte um vetor em um objeto anuncio
     * @param array $data vetor
     * @param \Anuncio\Entity\Anuncio $object (prototipo)
     * @return \Anuncio\Entity\Anuncio
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Entity) {
            $object->setId($data['id']);
            $object->setTitulo($data['titulo']);
            $object->setImagem($data['imagem']);
            $object->setDescricao($data['descricao']);
            $object->setPreco($data['preco']);
            return $object;
        }
    }
}