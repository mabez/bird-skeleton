<?php
namespace ContaFactory;

use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ViewHelperProviderInterface, ConfigProviderInterface
{

    public function getConfig()
    {
        return array_merge_recursive(include __DIR__ . '/config/controllers.config.php', include __DIR__ . '/config/router.config.php', include __DIR__ . '/config/service.manager.config.php', include __DIR__ . '/config/view.manager.config.php');
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

    public function getViewHelperConfig()
    {
        return require __DIR__ . '/config/view.helper.config.php';
    }
}
