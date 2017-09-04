<?php
namespace BirdSkeleton\Conta;

use BirdSkeleton\Conta\Compra\ViewModel as CompraViewModel;
use BirdSkeleton\Conta\Registro\ViewModel as RegistroViewModel;

return array(
    'service_manager' => array(
        'factories' => array(
            'ContaCompraViewModel' => CompraViewModel::class,
            'ContaRegistroViewModel' => RegistroViewModel::class,
        )
    )
);
