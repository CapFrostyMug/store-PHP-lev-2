<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{
    protected function getEntityClass()
    {
        return Users::class;
    }

    public function Auth($login, $pass)
    {
        $user = $this->getWhere("login", $login);

        if ($user != false && password_verify($pass, $user->pass)) {
            $_SESSION["login"] = $login;
            (new Session())->set("login", $login);
            return true;
        }
        return false;
    }

    public function isAuth()
    {
        return isset($_SESSION["login"]);
    }

    public function getName()
    {
        return $_SESSION["login"];
    }

    protected function getTableName()
    {
        return "users";
    }
}
