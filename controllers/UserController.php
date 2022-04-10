<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\{CartRepository, UserRepository, OrderRepository};

class UserController extends Controller
{
    public function actionIndex()
    {
        $user = (new UserRepository())->getName();

        if ($user == "admin") {

            $orders = (new OrderRepository())->getAll();
            echo $this->render("admin/orderList", [
                "orders" => $orders,
            ]);

        } else {
            $plug = ["Hello World!"];
            echo $this->render("user/main", [
                "plug" => $plug,
            ]);
        }
    }

    public function actionOrderDetails()
    {
        $session_id = (new Request())->getParams()["id"];

        $cart = (new CartRepository())->getCart($session_id);

        echo $this->render("admin/orderDetails", [
            "cart" => $cart,
        ]);
    }
}
