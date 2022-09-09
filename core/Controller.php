<?php
namespace core;

class Controller
{
    public $title;
    public $js = [];
    public $css = [];

    public function __construct()
    {

    }

    public function render($view, $param)
    {
        extract($param);

        ob_start();
        $controller = Application::getController();

        require Application::$config->basePath . '/views/' . lcfirst($controller) . '/' . $view . '.php';
        $content = ob_get_clean();
        require Application::$config->basePath . '/views/layouts/main.php';
    }

    public function addCss($css, $n)
    {
        $this->css[$n] = $css;
    }

    public function addJs($js, $n)
    {
        $this->js[$n] = $js;
    }

    public function getCss()
    {
        ksort($this->css);

        $str = '';
        foreach ($this->css as $value){
            $str .= '<link href="'.$value.'" rel="stylesheet" type="text/css">' . "\n";
        }
        echo $str;
    }

    public function getJs()
    {
        ksort($this->js);

        $str = '';
        foreach ($this->js as $value){
            $str .= '<script src="'.$value.'"></script>' . "\n";
        }
        echo $str;
    }
}
