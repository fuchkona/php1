<?php

define("HOME", __DIR__);

spl_autoload_register(function ($class_name) {
    require_once HOME .  '\\' . $class_name . '.php';
});
use engine\classes\Router;
use engine\classes\DB;
Router::init();
DB::close();