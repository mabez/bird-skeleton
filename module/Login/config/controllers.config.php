<?php
return array(
    'controllers' => array(
        'factories' => array(
            'LoginController' => 'Login\LoginControllerFactory',
            'SairController' => 'Login\Sair\SairControllerFactory',
            'RegistrarController' => 'Login\Registrar\RegistrarControllerFactory'
        )
    )
);
