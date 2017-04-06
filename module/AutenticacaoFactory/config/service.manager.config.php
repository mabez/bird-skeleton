<?php
namespace AutenticacaoFactory;

use AutenticacaoFactory\Identificacao\IdentificacaoManagerFactory;
use AutenticacaoFactory\Identificacao\IdentificacaoRepositoryFactory;
use AutenticacaoFactory\Identificacao\IdentificacaoGeneratorFactory;
use AutenticacaoFactory\Perfil\PerfilManagerFactory;
use AutenticacaoFactory\Perfil\PerfilRepositoryFactory;

return [
    'service_manager' => [
        'factories' => [
            'AutenticacaoManager' => AutenticacaoManagerFactory::class,
            'AutenticacaoRepository' => AutenticacaoRepositoryFactory::class,
            'AutenticacaoAdapter' => AutenticacaoAdapterFactory::class,
            'IdentificacaoManager' => IdentificacaoManagerFactory::class,
            'IdentificacaoRepository' => IdentificacaoRepositoryFactory::class,
            'IdentificacaoGenerator' => IdentificacaoGeneratorFactory::class,
            'PerfilManager' => PerfilManagerFactory::class,
            'PerfilRepository' => PerfilRepositoryFactory::class
        ]
    ]
];
