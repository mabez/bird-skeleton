<?php
namespace BirdSkeleton\Application;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

abstract class AutoloadableModule implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        $moduleNamespace = explode('\\', __NAMESPACE__);
        $moduleSuffix = $moduleNamespace[sizeof($moduleNamespace) - 1];
        $result = [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . $moduleSuffix,
                ],
            ],
        ];
        var_dump($result);die;
        return $result;
    }
}
