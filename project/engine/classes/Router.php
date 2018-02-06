<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.02.2018
 * Time: 19:26
 */

namespace engine\classes;

class Router
{
    private static $current_page;
    private static $params;

    private function __construct()
    {
    }

    public static function init() {
        $path = explode('/', $_SERVER['REQUEST_URI']);
        self::$current_page = $path[1] ? $path[1] : 'index';
        $params = array_slice($path, 2);
        if (count($params) > 1) {
            for ($i = 0; $i < count($params) - 1; $i += 2) {
                self::$params[$params[$i]] = $params[$i + 1];
            }
        }
        require_once HOME . '/ui/layouts/main.php';
    }

    /**
     * @return mixed
     */
    public static function getCurrentPage()
    {
        return self::$current_page;
    }

    public static function getParam($key) {
        if (isset(self::$params[$key]) && self::$params[$key]) {
            return self::$params[$key];
        }
        return null;
    }

}