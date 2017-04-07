<?php
namespace AdminView;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use ValorTotalCompraFactory\ViewHelper as ValorTotalCompraFactory;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\I18n\View\Helper\CurrencyFormat;

class Module implements ConfigProviderInterface, ViewHelperProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/config/view.manager.config.php';
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
                'valorTotalCompra' => ValorTotalCompraFactory::class,
            ],
            'invokables' => [
                'currencyFormat' => CurrencyFormat::class
            ]
        ];
    }
}
