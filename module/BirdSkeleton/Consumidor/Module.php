<?php

namespace BirdSkeleton\Consumidor;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Ecompassaro\Consumidor\Pagamento\Events as PagamentoEvents;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $this->attachListeners($eventManager, $e->getApplication()->getServiceManager());
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return array_merge_recursive(
            include __DIR__ . '/config/controllers.config.php',
            include __DIR__ . '/config/paypal.config.php',
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

    private function attachListeners(EventManagerInterface $eventManager, ServiceLocatorInterface $serviceLocator)
    {
        $pagamentoEvents = new PagamentoEvents($serviceLocator->get('PagamentoManager'));
        $pagamentoEvents->attach($eventManager);
    }
}
