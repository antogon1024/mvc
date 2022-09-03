<?php
namespace core;

class Controller
{
    public function render($view, $param)
    {
        extract($param);

        ob_start();
        $controller = Application::getController();

        //require __DIR__ . '/../views/test/' . $view . '.php';
        require __DIR__ . '/../views/' . lcfirst($controller) . '/' . $view . '.php';

        $output = ob_get_clean();

        echo $output;
    }
}
