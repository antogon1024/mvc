<?php

namespace core;

class Application
{
    public static $controller;
    public $action;
    public static $config;
    public static $params;

    //public $rules = [];

    public function __construct($config)
    {
        $ob = new \stdClass();

        foreach ($config as $name => $value) {
            $ob->$name = $value;
        }

        self::$config = $ob;
    }

    public function run()
    {
        $this->route();

        $class = 'controllers\\' . self::$controller;
        $action = $this->action;

        $method = new \ReflectionMethod($class, $action);
        $name = [];
        foreach ($method->getParameters() as $param) {
            $name[] = self::$params[$param->getName()];
        }

        $ob = new $class();
        //$ob->$action();
        call_user_func_array([$ob, $action], $name);
    }

    public function preparePattern($rule, $url)
    {
        $array = [];
        preg_match_all('/([^<>]+)/', $rule, $matches);

        $pattern = '';
        foreach ($matches[1] as $v){
            if(strpos($v, ':')){
                $pattern .= explode(':', $v)[1];
            }else{
                $pattern .= $v;
            }
        }

        $pattern = '#^' . $pattern . '$#';
        $array['pattern'] = $pattern;


        if(!preg_match($pattern, $url)) {
            $array['match'] = false;
        }else{
            $array['match'] = true;

            $a = $b = '';
            $params = [];
            foreach ($matches[1] as $k=>$v){
                if(strpos($v, ':')){
                    if(isset($matches[1][$k-1]) && !strpos($matches[1][$k-1], ':')){
                        $a = $matches[1][$k-1];
                    }
                    if(isset($matches[1][$k+1]) && !strpos($matches[1][$k+1], ':')){
                        $b = $matches[1][$k+1];
                    }
                    $ar = explode(':', $v);
                    $pattern = '#'. $a . '(' . $ar[1] . ')' . $b . '#';

                    preg_match($pattern, $url, $out);

                    $var = $ar[0];
                    $this->$var = $out[1]; //вызов __set
                    $params[$ar[0]]  = $out[1];
                    $a = $b = '';
                }
            }

            $array['params'] = $params;
        }

       return $array;
    }

    public function route()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $match = false;

        if (isset(self::$config->rules)) {
            foreach (self::$config->rules as $rule => $route) {
                $result = $this->preparePattern($rule, $url);

                if($result['match'] === true){
                    $match = true;
                    list($controller, $action) = explode('/', $route);
                }

            }
        }

        if ($match === false) {
            $url = trim($_SERVER['REQUEST_URI'], '/');
            if ($url == '') {
                $controller = self::$config['controllerDefault'];
                $action = 'index';
            } else {
                $ar = explode('/', $url);

                $controller = $ar[0];
                $action = (isset($ar[1])) ? $ar[1] : 'index';
            }
        }

        self::$controller = ucfirst($controller);
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