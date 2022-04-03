<?php

namespace app\controllers;

use app\models\repositories\CartRepository;
use app\engine\{Request, Session};
use app\models\entities\Carts;

class CartController extends Controller
{
    public function actionIndex()
    {
        $session_id = session_id();

        $cart = (new CartRepository())->getCart($session_id);

        echo $this->render("cart", [
            "cart" => $cart,
        ]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()["id"];
        $session_id = session_id();

        $cart = new Carts($session_id, $id);
        (new CartRepository())->save($cart);

        $response = [
            "status" => "Ok",
            "count" => (new CartRepository())->getCountWhere("session_id", $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        die();
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()["id"];
        $session_id = (new Session())->getId();

        $cart = (new CartRepository())->getOne($id);
        $error = "Ok";

        if ($session_id == $cart->session_id) {
            (new CartRepository())->delete($cart);
        } else {
            $error = "Error";
        }

        $response = [
            "status" => $error,
            "count" => (new CartRepository())->getCountWhere("session_id", $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        die();
    }
}
