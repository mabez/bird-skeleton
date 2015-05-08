<?php
namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Model\PaginaAnuncios;

class PaginaAnunciosModel implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new PaginaAnuncios($serviceLocator->get('Anuncio'), $serviceLocator->get('Site'));
    }

}
