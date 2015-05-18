<?php
namespace Anuncio\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Anuncio\Model\PaginaAnuncios;

class PaginaAnunciosModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PaginaAnuncios($serviceLocator->get('Anuncio'));
    }

}
