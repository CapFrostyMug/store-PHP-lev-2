<?php

namespace app\controllers;

use app\models\Users;

class AuthController extends Controller
{
    public function actionLogin()
    {
        // TODO использовать Request
        $login = $_POST["login"];
        $pass = $_POST["pass"];

        if (Users::Auth($login, $pass)) {
            header("Location: ?");
            die();
        } else {
            die("Неверный логин/пароль");
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location: ?");
        die();
    }
}
