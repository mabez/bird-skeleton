<?php
namespace BirdSkeleton\Admin;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements ConfigProviderInterface, ViewHelperProviderInterface
{
    public function getConfig()
    {
        return array_merge_recursive(
            include __DIR__ . '/config/acesso.roles.resources.config.php',
            include __DIR__ . '/config/admin.routes.config.php',
            include __DIR__ . '/config/controllers.config.php',
            include __DIR__ . '/config/router.config.php',
            include __DIR__ . '/config/service.manager.config.php',
            include __DIR__ . '/config/view.manager.config.php'
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

    public function getViewHelperConfig()
    {
        return require __DIR__ . '/config/view.helper.config.php';
    }
}
