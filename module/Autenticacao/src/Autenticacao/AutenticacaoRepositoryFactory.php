<?php
namespace Autenticacao;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;

class AutenticacaoRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new AutenticacaoRepository(new Adapter($config['db']), new AutenticacaoHydrator(), new Autenticacao());
    }
}
