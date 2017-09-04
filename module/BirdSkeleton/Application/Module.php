<?php

namespace BirdSkeleton\Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\I18n\View\Helper\CurrencyFormat;
use Ecompassaro\Acesso\Factory\ViewHelper as AcessoViewHelperFactory;
use BirdSkeleton\Login\Identificacao\UsuarioViewHelper as IdentificacaoUsuarioViewHelperFactory;
use BirdSkeleton\Login\Identificacao\ViewHelper as IdentificadoViewHelperFactory;
use Ecompassaro\Application\Factory\Site\DefaultViewHelper as SiteDefaultViewHelperFactory;

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
            include __DIR__ . '/config/view.manager.config.php',
            include __DIR__ . '/config/zfctwig.config.php',
            include __DIR__ . '/config/service.manager.config.php'
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
