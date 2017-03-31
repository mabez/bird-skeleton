<?php
return [
    'service_manager' => [
        'factories' => [
            'CompraManager' => 'CompraFactory\Manager',
            'CompraRepository' => 'CompraFactory\Repository',
            'CompraStatusManager' => 'CompraFactory\Status\Manager',
            'CompraStatusRepository' => 'CompraFactory\Status\Repository'
        ]
    ]
];