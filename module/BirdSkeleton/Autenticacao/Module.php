<?php

namespace BirdSkeleton\Autenticacao;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use BirdSkeleton\Application\AutoloadableModule;

class Module extends AutoloadableModule implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/service.manager.config.php';
    }
}
