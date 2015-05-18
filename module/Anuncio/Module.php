<?php

namespace Anuncio;

use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements ViewHelperProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'real_format' => 'Anuncio\View\Helper\RealFormat'
            )
        );
    }
}
