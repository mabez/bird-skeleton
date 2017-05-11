<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'ContaCompraViewModel' => \ContaFactory\Compra\ViewModel::class,
            'ContaRegistroViewModel' => \ContaFactory\Registro\ViewModel::class,
        )
    )
);
