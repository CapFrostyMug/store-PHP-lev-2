<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request())->getParams()["login"];
        $pass = (new Request())->getParams()["pass"];

        if ((new UserRepository())->Auth($login, $pass)) {
            header("Location: /");
            die();
        } else {
            die("Неверный логин/пароль");
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        die();
    }
}
