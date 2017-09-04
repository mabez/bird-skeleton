<?php

namespace BirdSkeleton\Produto;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/service.manager.config.php';
    }
}
