<?php
namespace SiteFactory;

return [
    'service_manager' => [
        'abstract_factories' => [
            \Zend\Cache\Service\StorageCacheAbstractServiceFactory::class,
            \Zend\Log\LoggerAbstractServiceFactory::class
        ],
        'factories' => [
            'SiteManager' => Manager::class,
            'SiteRepository' => Repository::class
        ]
    ]
];
