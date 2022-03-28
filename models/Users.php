<?php

namespace app\models;

class Users extends DBModel
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        "login" => false,
        "pass" => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function Auth($login, $pass)
    {
        $user = Users::getWhere("login", $login);
        // TODO проверять пароль только если $user не false
        // password_hash(123, PASSWORD_DEFAULT);
        // password_verify($pass, $user->pass);

        // $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        if ($pass == $user->pass) {
            $_SESSION["login"] = $login;
            return true;
        }
        return false;
    }

    public static function isAuth()
    {
        return isset($_SESSION["login"]);
    }

    public static function getName()
    {
        return $_SESSION["login"];
    }

    public static function getTableName()
    {
        return "users";
    }
}
