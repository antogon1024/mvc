<?php
namespace controllers;

use core\Controller;
//use core\Application;
use models\Site;

class Test extends Controller
{
    public function index($category, $id)
    {
       echo $category .'--'. $id;exit;
        $site = Site::getRow("SELECT * FROM `site` WHERE `id` = ?", 61);
        echo '<pre>';print_r($site);exit;

        $this->render('index', [
            //'test' => $test,
        ]);
    }

    public function bbb()
    {


        //почему не работает если метод one -не статический
        //$site = new Site;
        //$site = Site::one("SELECT * FROM `site` WHERE `id` = ?", 61);

        echo '<pre>';print_r($site);exit;

        $test = 'asdfgh123';
        $this->render('bbb', [
            'test' => $test,
        ]);
    }
}