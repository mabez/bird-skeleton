<?php

return array(
    'service_manager' => array(
        'invokables' => array(
           'CompraManager' => 'Compra\CompraManager',
           'CompraStatusManager' => 'Compra\Status\StatusManager'
        ),
        'factories' => array(
            'CompraRepository' => 'Compra\CompraRepositoryFactory',
            'CompraStatusRepository' => 'Compra\Status\StatusRepositoryFactory'
        )
    )
);