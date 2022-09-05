<?php
namespace controllers;

use core\Controller;

class Test extends Controller
{
    public function index()
    {
        echo 'test2';
    }

    public function bbb()
    {
        $test = 'asdfgh123';
        $this->render('bbb', [
            'test' => $test,
        ]);
    }
}