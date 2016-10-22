<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'SiteManager' => 'Site\SiteManagerFactory',
            'SiteRepository' => 'Site\SiteRepositoryFactory'
        )
    )
);
