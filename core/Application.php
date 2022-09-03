<?php
namespace core;

//use controllers\Test;

class Application
{
    public static $controller;
    public $action;

    //public $viewPath;

    public function run()
    {
       $this->route();

       $class = 'controllers\\' . self::$controller;
       $action = $this->action;

       $ob = new $class('asd');
       $ob->$action();
    }

    public function route()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if($url == '/'){
            $controller = 'default';
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

}