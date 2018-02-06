<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 06.02.2018
 * Time: 15:34
 */

namespace engine\classes;


class User
{
    private $u_id;
    private $login;
    private $pass;
    private $role;

    const ROLE_ADMIN = 255;
    const ROLE_USER = 0;

    /**
     * User constructor.
     * @param $u_id
     */
    public function __construct($u_id = null)
    {
        $this->u_id = $u_id;
        $this->load();
    }

    public function load()
    {
        if (!is_null($this->u_id) && is_numeric($this->u_id)) {
            if ($row = DB::getRow("SELECT * FROM `users` WHERE `u_id` = " . DB::esc($this->u_id))) {
                $this->login = $row['login'];
                $this->pass = $row['pass'];
                $this->role = $row['role'];

            } else {
                $this->u_id = null;
            }
        }
    }

    public function save()
    {
        if (!is_null($this->u_id) && is_numeric($this->u_id)) {
            DB::update("UPDATE `users` SET `login` = '" . DB::esc($this->login) . "', `pass` = '" . DB::esc($this->pass) . "', `role` = " . DB::esc($this->role) . " WHERE `u_id` = " . DB::esc($this->u_id));
        } else {
            $this->u_id = DB::insert("INSERT INTO `users`(`login`, `pass`) VALUES ('" . DB::esc($this->login) . "', '" . DB::esc($this->pass) . "');");
        }
    }

    public function delete()
    {
        DB::delete("DELETE FROM `users` WHERE `u_id` = " . DB::esc($this->u_id));
    }

    public static function getAll()
    {
        $users = [];
        foreach (DB::getRows("SELECT * FROM `users`;") as $db_user) {
            $user = new User($db_user['u_id']);
            $user->setLogin($db_user['login']);
            $user->setPass($db_user['pass']);
            $user->setRole($db_user['role']);
            $users[] = $user;
        }
        return $users;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->u_id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param $pass
     * @return bool
     */
    public function verifyPass($pass)
    {
        return password_verify($pass, $this->pass);
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isUser()
    {
        return $this->role == self::ROLE_USER || $this->isAdmin();
    }

}