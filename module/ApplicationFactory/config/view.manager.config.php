<?php
return array(
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'produto/produto' => __DIR__ . '/../../Application/view/produto/index/produto.twig',
            'produto/lista' => __DIR__ . '/../../Application/view/produto/index/lista.twig',
            'error/404' => __DIR__ . '/../../Application/view/error/404.twig',
            'error/index' => __DIR__ . '/../../Application/view/error/index.twig',
            'layout/layout' => __DIR__ . '/../../Application/view/layout/layout.twig',
            'layout/nav' => __DIR__ . '/../../Application/view/layout/nav.twig',
            'layout/mensagens' => __DIR__ . '/../../Application/view/layout/mensagens.twig',
            'site/index/cabecalho' => __DIR__ . '/../../Application/view/site/index/cabecalho.twig',
            'site/index/index' => __DIR__ . '/../../Application/view/site/index/index.twig',
            'site/layout' => __DIR__ . '/../../Application/view/site/layout.twig'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../../Application/view'
        )
    )
);
