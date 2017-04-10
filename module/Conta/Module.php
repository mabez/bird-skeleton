<?php

namespace Conta;

use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use CompraFactory\ValorTotal\ViewHelper as ValorTotalCompraFactory;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\I18n\View\Helper\CurrencyFormat;
use Login\Identificacao\IdentificacaoIdViewHelperFactory;

class Module implements ViewHelperProviderInterface, ConfigProviderInterface
{
    public function getConfig()
    {
        return array_merge_recursive(
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
        return [
            'factories' => [
                'identificacaoId' => IdentificacaoIdViewHelperFactory::class,
                'valorTotalCompra' => ValorTotalCompraFactory::class
            ],
            'invokables' => [
                'currencyFormat' => CurrencyFormat::class
            ]
        ];
    }
}
