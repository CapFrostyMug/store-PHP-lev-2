<?php

namespace app\controllers;

use app\interfaces\iRender;
use app\models\repositories\{CartRepository, UserRepository};

abstract class Controller
{
    private $action;
    private $defaultAction = "index";
    private $render;

    public function __construct(iRender $render)
    {
        $this->render = $render;
    }

    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "Экшн отсутствует";
        }
    }

    public function render($template, $params = [])
    {
        return $this->renderTemplate("layouts/main", [
            "menu" => $this->renderTemplate("menu", [
                "userName" => (new UserRepository())->getName(),
                "isAuth" => (new UserRepository())->isAuth(),
                "count" => (new CartRepository())->getCountWhere("session_id", session_id()),
            ]),
            "content" => $this->renderTemplate($template, $params),
        ]);
    }

    public function renderTemplate($template, $params)
    {
        return $this->render->renderTemplate($template, $params);
    }
}
