<?php

namespace app\controllers;

use app\models\repositories\OrderRepository;
use app\engine\Request;
use app\models\entities\Orders;

class OrderController extends Controller
{
    public function actionAdd()
    {
        $phoneNum = (new Request())->getParams()["phone-num"];
        $userName = (new Request())->getParams()["user-name"];
        $session_id = session_id();

        $order = new Orders($session_id, $userName, $phoneNum);

        (new OrderRepository())->save($order);

        header("Location: /");
        die();
    }
}
