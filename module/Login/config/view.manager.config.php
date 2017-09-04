<?php
return array(
    'view_manager' => array(
        'template_map' => array(
            'login/bloco' => __DIR__ . '/../view/login/bloco.twig',
            'login/index' => __DIR__ . '/../view/login/index/index.twig',
            'login/new' => __DIR__ . '/../view/login/new/index.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);
