<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 06.02.2018
 * Time: 17:06
 */

namespace engine\classes;


class App
{
    private $user;


    public function __construct()
    {
        Router::init();
        if (file_exists(HOME . '/ui/pages/' . Router::getCurrentPage() . '.php')) {
            require_once HOME . '/ui/layouts/main.php';
        } else {
            Router::setCurrentPage(null);
        }
        DB::close();
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}