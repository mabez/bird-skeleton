<?php
namespace Application\Mapper\Hydrator;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Application\Entity\Site as Entity;

class Site implements HydratorInterface
{
    /**
     * Converte um objeto site em vetor
     * @param \Application\Entity\Site $object objeto
     * @return array
     */
    public function extract($object)
    {
        return $object->toArray();
    }

    /**
     * Converte um vetor em um objeto site
     * @param array $data vetor
     * @param \Application\Entity\Site $object (prototipo)
     * @return \Application\Entity\Site
     */
    public function hydrate(array $data, $object)
    {
        if ($object instanceof Entity) {
            $object->setNome($data['nome']);
            $object->setLogo($data['logo']);
            $object->setIntro($data['intro']);
            $object->setCopyright($data['copyright']);
            return $object;
        }
    }
}