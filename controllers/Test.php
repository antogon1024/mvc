<?php
namespace controllers;

use core\Controller;

class Test extends Controller
{
    public $costr;
    public function __construct($a)
    {
        $this->costr = $a;
    }

    public function index()
    {
        echo 'test' . $this->costr;
    }

    public function bbb()
    {
        echo 'test-bbb-' . $this->costr;
        $test = 'asdfgh123';
        $this->render('bbb', [
            'test' => $test,
        ]);
    }
}