<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/*
//echo 222;
require_once __DIR__ . '/../core/autoload.php';

//require_once ("../core/Application.php");
//require_once __DIR__ . '/../core/Application.php';

(new \core\Application)->run();*/

//------------------------------------
/*spl_autoload_register(function ($className) {
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
});

$author = new \MyProject\Models\Users\User('Иван');
$article = new \MyProject\Models\Articles\Article('Заголовок', 'Текст', $author);
var_dump($article);*/
use core\Application;

spl_autoload_register(function ($className) {
    //require_once __DIR__ . '/../core/' . str_replace('\\', '/', $className) . '.php';
    require_once __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';
    //require_once __DIR__ . '/../' . $className . '.php';
});
//$a = new \src\Application;

$a = new Application;
$a->run();
echo '<pre>';print_r($a);exit;
 
		
