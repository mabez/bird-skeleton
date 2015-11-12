<?php

return array(
    'service_manager' => array(
        'invokables' => array(
           'CompraManager' => 'Compra\CompraManager'
        ),
        'factories' => array(
            'CompraRepository' => 'Compra\CompraRepositoryFactory'
        )
    )
);