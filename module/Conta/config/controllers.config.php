<?php
namespace BirdSkeleton\Conta;

use BirdSkeleton\Conta\Compra\Controller as CompraController;
use BirdSkeleton\Conta\Registro\Controller as RegistroController;

return array(
    'controllers' => array(
        'factories' => array(
            'ContaComprasController' => CompraController::class,
            'ContaRegistroController' => RegistroController::class
        )
    )
);
