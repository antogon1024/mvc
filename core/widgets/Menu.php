<?php

namespace core\widgets;

//TODO
class Menu
{
    public static $items = '';

    public static function run($ar)
    {
        return $items = self::renderItems($ar['items']);
        //return '<ul>' . $items . '</ul>';
    }

    protected static function renderItems($items)
    {
        foreach ($items as $k => $v) {
            self::$items .= '<li><a href="/' . $v['url'] . '">' . $v['label'] . '</a></li>';
            if(isset($v['items'])){
                self::$items .= '<ul>';
                self::renderItems($v['items']);
                self::$items .= '</ul>';
            }
        }

        return '<ul>' . self::$items . '</ul>';
    }
}