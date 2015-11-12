<?php
return array(
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'anuncio/anuncio' => __DIR__ . '/../view/anuncio/index/anuncio.twig',
            'anuncio/lista' => __DIR__ . '/../view/anuncio/index/lista.twig',
            'error/404' => __DIR__ . '/../view/error/404.twig',
            'error/index' => __DIR__ . '/../view/error/index.twig',
            'layout/layout' => __DIR__ . '/../view/layout/layout.twig',
            'layout/nav' => __DIR__ . '/../view/layout/nav.twig',
            'layout/mensagens' => __DIR__ . '/../view/layout/mensagens.twig',
            'site/index/cabecalho' => __DIR__ . '/../view/site/index/cabecalho.twig',
            'site/index/index' => __DIR__ . '/../view/site/index/index.twig'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);
