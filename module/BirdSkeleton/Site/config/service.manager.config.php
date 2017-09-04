<?php
namespace BirdSkeleton\Site;

return [
    'service_manager' => [
        'abstract_factories' => [
            \Zend\Cache\Service\StorageCacheAbstractServiceFactory::class,
            \Zend\Log\LoggerAbstractServiceFactory::class
        ],
        'factories' => [
            'SiteManager' => \Ecompassaro\Site\Factory\Manager::class,
            'SiteRepository' => \Ecompassaro\Site\Factory\Repository::class
        ]
    ]
];
