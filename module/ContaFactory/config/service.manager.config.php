<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'ContaCompraViewModel' => 'ContaFactory\Compra\ViewModel',
            'ContaRegistroViewModel' => 'ContaFactory\Registro\ViewModelFactory',
        )
    )
);
