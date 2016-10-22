<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'AutenticacaoManager' => 'Autenticacao\AutenticacaoManagerFactory',
            'AutenticacaoRepository' => 'Autenticacao\AutenticacaoRepositoryFactory',
            'AutenticacaoAdapter' => 'Autenticacao\AutenticacaoAdapterFactory',
            'IdentificacaoManager' => 'Autenticacao\Identificacao\IdentificacaoManagerFactory',
            'IdentificacaoRepository' => 'Autenticacao\Identificacao\IdentificacaoRepositoryFactory',
            'IdentificacaoGenerator' => 'Autenticacao\Identificacao\IdentificacaoGeneratorFactory',
            'PerfilManager' => 'Autenticacao\Perfil\PerfilManagerFactory',
            'PerfilRepository' => 'Autenticacao\Perfil\PerfilRepositoryFactory'
        )
    )
);
