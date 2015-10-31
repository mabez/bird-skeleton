<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'invokables' => array(
            'SiteManager' => 'Site\SiteManager',
        ),
        'factories' => array(
            'SiteRepository' => 'Site\SiteRepositoryFactory'
        )
    ),
);
