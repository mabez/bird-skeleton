<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'AutenticacaoRepository' => 'Autenticacao\AutenticacaoRepositoryFactory',
            'IdentificacaoRepository' => 'Autenticacao\Identificacao\IdentificacaoRepositoryFactory',
            'IdentificacaoGenerator' => 'Autenticacao\Identificacao\IdentificacaoGeneratorFactory',
            'AutenticacaoAdapter' => 'Autenticacao\AutenticacaoAdapterFactory',
            'PerfilRepository' => 'Autenticacao\Perfil\PerfilRepositoryFactory'
        ),
        'invokables' => array(
            'AutenticacaoManager' => 'Autenticacao\AutenticacaoManager',
            'IdentificacaoManager' => 'Autenticacao\Identificacao\IdentificacaoManager',
            'PerfilManager' => 'Autenticacao\Perfil\PerfilManager'
        )
    ),
);
