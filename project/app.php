<?php
spl_autoload_register(function ($class_name) {
    require_once __DIR__ .  '\\' . $class_name . '.php';
});
use engine\classes\Router;
use engine\classes\DB;
Router::init();
require_once __DIR__ . '/ui/layouts/main.php';
DB::close();