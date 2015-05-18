<?php
namespace Anuncio\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Anuncio\Model\PaginaModificarAnuncio;

class PaginaModificarAnuncioModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PaginaModificarAnuncio($serviceLocator->get('Anuncio'));
    }
}
