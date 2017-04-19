<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'LoginViewModel' => 'LoginFactory\ViewModel',
            'RegistrarViewModel' => 'LoginFactory\Registrar\ViewModel'
        )
    )
);
