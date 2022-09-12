<?php
namespace core;

use PDO;
class Model
{
    public static $db;
    public static $sth = null;

    public function __construct()
    {
        //extract(Application::$config->db);
        //self::$db = new \PDO($dns, $username, $password);
    }

    public static function getError()
    {
        $info = self::$sth->errorInfo();
        return (isset($info[2])) ? 'SQL: ' . $info[2] : null;
    }

    public static function getDb()
    {
        extract(Application::$config->db);
        self::$db = new PDO($dns, $username, $password);

        return self::$db;
    }

    public static function one($query, $param)
    {

        self::$sth = self::getDb()->prepare($query);
        self::$sth->execute((array)$param);
         return   self::$sth->fetch(PDO::FETCH_ASSOC);

    }

}