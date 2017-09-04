<?php
namespace BirdSkeleton\Login;

use BirdSkeleton\Login\Registrar\ViewModel as RegistrarViewModel;

return array(
    'service_manager' => array(
        'factories' => array(
            'LoginViewModel' => ViewModel:class,
            'RegistrarViewModel' => RegistrarViewModel::class
        )
    )
);
