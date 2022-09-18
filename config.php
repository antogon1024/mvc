<?php

return $config = [
    'basePath' => __DIR__,
    'controllerDefault' => 'test',
    'db' => [
        //'dsn' => 'mysql:host=localhost;dbname=fseek',
        'dns' => 'mysql:host=localhost;dbname=fseek',
        'username' => 'pma',
        'password' => 'pmapass',
        'charset' => 'utf8',
    ],
    'rules' => [
        '<category:[a-z]+>/<id:\d+>' => 'test/index',
        //'s-<category:[a-z]+>/p-<id:\d+>' => 'test/index',
    ],
];

