<?php

namespace BirdSkeleton\Pagamento;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/service.manager.config.php';
    }

    public function getAutoloaderConfig()
    {
        $moduleNamespace = explode('\\', __NAMESPACE__);
        $moduleSuffix = $moduleNamespace[sizeof($moduleNamespace) - 1];
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . $moduleSuffix,
                ),
            ),
        );
    }
}
