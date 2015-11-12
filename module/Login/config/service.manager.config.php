<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'LoginViewModel' => 'Login\LoginViewModelFactory',
            'RegistrarViewModel' => 'Login\Registrar\RegistrarViewModelFactory'
        )
    )
);
