<?php

namespace ApplicationView;

class Module
{

    public function getConfig()
    {
        return array_merge_recursive(
            include __DIR__ . '/config/view.manager.config.php',
            include __DIR__ . '/config/zfctwig.config.php'
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }
}
