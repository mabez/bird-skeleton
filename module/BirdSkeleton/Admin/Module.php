<?php
namespace BirdSkeleton\Admin;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements ConfigProviderInterface, ViewHelperProviderInterface, AutoloaderProviderInterface
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
        $moduleNamespace = explode('\\', __NAMESPACE__);
        $moduleSuffix = $moduleNamespace[sizeof($moduleNamespace) - 1];
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . $moduleSuffix,
                ],
            ],
        ];
    }

    public function getViewHelperConfig()
    {
        return require __DIR__ . '/config/view.helper.config.php';
    }
}
