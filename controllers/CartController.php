<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
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
        /*$id = (new Request())->getParams()["id"];
        $session_id = (new Session())->getId();*/
        $id = $_GET["id"];
        $session_id = session_id();

        $cart = Carts::getOne($id);
        $error = "Ok";

        if ($session_id == $cart->session_id) {
            $cart->delete();
        } else {
            $error = "Error";
        }

        $response = [
            "status" => $error,
            "count" => Carts::getCountWhere("session_id", $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        die();
    }
}
