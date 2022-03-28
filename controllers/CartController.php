<?php

namespace app\controllers;

use app\models\Carts;

class CartController extends Controller
{
    public function actionIndex()
    {
        $session_id = session_id();

        $cart = Carts::getCart($session_id);

        echo $this->render("cart", [
            "cart" => $cart,
        ]);
    }

    public function actionAdd()
    {
        $id = $_GET["id"];
        $session_id = session_id();

        (new Carts($session_id, $id))->save();

        $response = [
            "status" => "Ok",
            "count" => Carts::getCountWhere("session_id", $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        die();
    }

    public function actionDelete()
    {
        $id = $_GET["id"];
        $session_id = session_id();

        (new Carts($session_id, $id))->delete();

        //header("Location: ?c=cart");

        $response = [
            "status" => "Ok",
            "count" => Carts::getCountWhere("session_id", $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        die();
    }
}
