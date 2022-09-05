<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use core\Application;

spl_autoload_register(function ($className) {
    require_once __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';
});

$config = require __DIR__ . '/../config.php';
$a = new Application($config);
$a->run();