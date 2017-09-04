<?php
namespace BirdSkeleton\Autenticacao;

use BirdSkeleton\Autenticacao\Identificacao\Manager as IdentificacaoManager;
use BirdSkeleton\Autenticacao\Identificacao\Repository as IdentificacaoRepository;
use BirdSkeleton\Autenticacao\Identificacao\Generator as IdentificacaoGenerator;
use BirdSkeleton\Autenticacao\Perfil\Manager as PerfilManager;
use BirdSkeleton\Autenticacao\Perfil\Repository as PerfilRepository;

return [
    'service_manager' => [
        'factories' => [
            'AutenticacaoManager' => Manager::class,
            'AutenticacaoRepository' => Repository::class,
            'AutenticacaoAdapter' => Adapter::class,
            'IdentificacaoManager' => IdentificacaoManager::class,
            'IdentificacaoRepository' => IdentificacaoRepository::class,
            'IdentificacaoGenerator' => IdentificacaoGenerator::class,
            'PerfilManager' => PerfilManager::class,
            'PerfilRepository' => PerfilRepository::class
        ]
    ]
];
