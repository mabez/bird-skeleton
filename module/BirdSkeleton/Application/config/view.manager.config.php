<?php
return [
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'produto/produto' => __DIR__ . '/../view/produto/index/produto.twig',
            'produto/lista' => __DIR__ . '/../view/produto/index/lista.twig',
            'error/404' => __DIR__ . '/../view/error/404.twig',
            'error/index' => __DIR__ . '/../view/error/index.twig',
            'layout/layout' => __DIR__ . '/../view/layout/layout.twig',
            'layout/nav' => __DIR__ . '/../view/layout/nav.twig',
            'layout/mensagens' => __DIR__ . '/../view/layout/mensagens.twig',
            'site/index/cabecalho' => __DIR__ . '/../view/site/index/cabecalho.twig',
            'site/index/index' => __DIR__ . '/../view/site/index/index.twig',
            'site/layout' => __DIR__ . '/../view/site/layout.twig'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ]
];
