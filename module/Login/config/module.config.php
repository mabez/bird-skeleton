<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'LoginRepository' => 'Login\LoginRepositoryFactory',
            'IdentificacaoRepository' => 'Login\Identificacao\IdentificacaoRepositoryFactory',
            'IdentificacaoGenerator' => 'Login\Identificacao\IdentificacaoGeneratorFactory',
            'LoginAdapter' => 'Login\LoginAdapterFactory'
        ),
        'invokables' => array(
            'LoginManager' => 'Login\LoginManager',
            'IdentificacaoManager' => 'Login\Identificacao\IdentificacaoManager'
        )
    ),
);