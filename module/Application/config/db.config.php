<?php
return array(
    'db' => array(
        'driver' => 'Pdo',
        'username' => 'root', // edit this
        'password' => 'bird_skeleton', // edit this
        'dsn' => 'mysql:dbname=bird_skeleton;host=localhost',// edit this
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    )
);
