<?php
namespace CompraFactory;

use CompraFactory\Status\Manager as StatusManager;
use CompraFactory\Status\Repository as StatusRepository;

return [
    'service_manager' => [
        'factories' => [
            'CompraManager' => Manager::class,
            'CompraRepository' => Repository::class,
            'CompraStatusManager' => StatusManager::class,
            'CompraStatusRepository' => StatusRepository::class
        ]
    ]
];