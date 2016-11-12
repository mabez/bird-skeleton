<?php
namespace Autenticacao;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class AutenticacaoRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('config');
        return new AutenticacaoRepository(new Adapter($config['db']), new AutenticacaoHydrator(), new Autenticacao());
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

    }
}
