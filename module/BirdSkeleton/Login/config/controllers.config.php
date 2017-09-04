<?php
namespace BirdSkeleton\Login;

use BirdSkeleton\Login\Sair\Controller as SairController;
use BirdSkeleton\Login\Registrar\Controller as RegistrarController;

return array(
    'controllers' => array(
        'factories' => array(
            'LoginController' => Controller::class,
            'SairController' => SairController::class,
            'RegistrarController' => RegistrarController::class
        )
    )
);
