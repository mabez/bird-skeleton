<?php
return array(
    'controllers' => array(
        'factories' => array(
            'LoginController' => 'LoginFactory\Controller',
            'SairController' => 'LoginFactory\Sair\Controller',
            'RegistrarController' => 'LoginFactory\Registrar\Controller'
        )
    )
);
