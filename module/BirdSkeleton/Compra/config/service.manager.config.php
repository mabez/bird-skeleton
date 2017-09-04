<?php
namespace BirdSkeleton\Compra;

use BirdSkeleton\Compra\Status\Manager as StatusManager;
use BirdSkeleton\Compra\Status\Repository as StatusRepository;

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
