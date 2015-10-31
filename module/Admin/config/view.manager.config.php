<?php

return array(
    'view_manager' => array(
        'template_map' => array(
            'admin/admin/index' => __DIR__ . '/../view/admin/index/index.twig',
            'admin/admin/site' => __DIR__ . '/../view/admin/site/site.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    )
);
