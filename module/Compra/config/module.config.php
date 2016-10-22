<?php

return array(
    'service_manager' => array(
        'factories' => array(
           'CompraManager' => 'Compra\CompraManagerFactory',
            'CompraRepository' => 'Compra\CompraRepositoryFactory',
            'CompraStatusManager' => 'Compra\Status\StatusManagerFactory',
            'CompraStatusRepository' => 'Compra\Status\StatusRepositoryFactory'
        )
    )
);