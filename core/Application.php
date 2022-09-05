<?php
namespace core;

class Application
{
    public static $controller;
    public $action;
    public static $config;
    public static $params;

    public function __construct($config)
    {
        $ob = new \stdClass();

        foreach ($config as $name=>$value) {
            $ob->$name = $value;
        }

        self::$config = $ob;
    }

    public function run()
    {
       $this->route();

       $class = 'controllers\\' . self::$controller;
       $action = $this->action;

       $ob = new $class();
       $ob->$action();
    }

    public function route()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if($url == ''){
            $controller = self::$config['controllerDefault'];
            $action = 'index';
        }else{
            $ar = explode('/', $url);

            $controller = $ar[0];
            $action = (isset($ar[1])) ? $ar[1] : 'index';

        }

        self::$controller = ucfirst ($controller);
        $this->action = $action;
    }

    public static function getController()
    {
        return self::$controller;
    }

    public function __set($name, $value)
    {
        self::$params[$name] = $value;
    }

    public function __get($name)
    {
        return self::$params[$name];
    }
}