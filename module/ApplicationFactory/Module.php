<?php

namespace ApplicationFactory;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\I18n\View\Helper\CurrencyFormat;
use AcessoFactory\AcessoViewHelperFactory;
use Login\Identificacao\IdentificacaoUsuarioViewHelperFactory;
use Login\Identificacao\IdentificadoViewHelperFactory;
use ApplicationFactory\Site\SiteDefaultViewHelperFactory;

class Module implements ViewHelperProviderInterface, ConfigProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return array_merge_recursive(
            include __DIR__ . '/config/controllers.config.php',
            include __DIR__ . '/config/db.config.php',
            include __DIR__ . '/config/router.config.php',
            include __DIR__ . '/config/service.manager.config.php'
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
        return [
            'factories' => [
              'acesso' => AcessoViewHelperFactory::class,
              'identificacaoUsuario' => IdentificacaoUsuarioViewHelperFactory::class,
              'identificado' => IdentificadoViewHelperFactory::class,
              'siteDefault' => SiteDefaultViewHelperFactory::class
            ],
            'invokables' => [
                'currencyFormat' => CurrencyFormat::class
            ]
        ];
   }
}
