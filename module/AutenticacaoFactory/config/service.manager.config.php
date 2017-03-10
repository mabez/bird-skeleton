<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'AutenticacaoManager' => 'AutenticacaoFactory\AutenticacaoManagerFactory',
            'AutenticacaoRepository' => 'AutenticacaoFactory\AutenticacaoRepositoryFactory',
            'AutenticacaoAdapter' => 'AutenticacaoFactory\AutenticacaoAdapterFactory',
            'IdentificacaoManager' => 'AutenticacaoFactory\Identificacao\IdentificacaoManagerFactory',
            'IdentificacaoRepository' => 'AutenticacaoFactory\Identificacao\IdentificacaoRepositoryFactory',
            'IdentificacaoGenerator' => 'AutenticacaoFactory\Identificacao\IdentificacaoGeneratorFactory',
            'PerfilManager' => 'AutenticacaoFactory\Perfil\PerfilManagerFactory',
            'PerfilRepository' => 'AutenticacaoFactory\Perfil\PerfilRepositoryFactory'
        )
    )
);
