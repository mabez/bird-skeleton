<?php
namespace Anuncio\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Anuncio\Model\PaginaAdminAnuncios;

class PaginaAdminAnunciosModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PaginaAdminAnuncios($serviceLocator->get('Anuncio'));
    }
}
