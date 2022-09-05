<?php
namespace core;

class Controller
{
    public $title;

    public function render($view, $param)
    {
        extract($param);

        ob_start();
        $controller = Application::getController();

        require Application::$config->basePath . '/views/' . lcfirst($controller) . '/' . $view . '.php';

        $content = ob_get_clean();
        require Application::$config->basePath . '/views/layouts/main.php';
    }
}
