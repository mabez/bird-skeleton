<?php
namespace AutenticacaoFactory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Autenticacao\AutenticacaoRepository;
use Autenticacao\AutenticacaoHydrator;
use Autenticacao\Autenticacao;

class AutenticacaoRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new AutenticacaoRepository(new Adapter($config['db']), new AutenticacaoHydrator(), new Autenticacao());
    }
}
