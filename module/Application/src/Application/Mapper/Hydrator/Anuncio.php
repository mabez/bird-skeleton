<?php
namespace Application\Mapper\Hydrator;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Application\Entity\Anuncio as Entity;

class Anuncio implements HydratorInterface
{
    /**
     * Converte um objeto anuncio em vetor
     * @param \Application\Entity\Anuncio $object objeto
     * @return array
     */
    public function extract($object)
    {
        return $object->toArray();
    }

    /**
     * Converte um vetor em um objeto anuncio
     * @param array $data vetor
     * @param \Application\Entity\Anuncio $object (prototipo)
     * @return \Application\Entity\Anuncio
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Entity) {
            $object->setTitulo($data['titulo']);
            $object->setImagem($data['imagem']);
            $object->setDescricao($data['descricao']);
            $object->setPreco($data['preco']);
            return $object;
        }
    }
}