<?php

namespace app\controllers;

use app\models\Carts;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = Carts::getCart();

        echo $this->render("cart", [
            "cart" => $cart,
        ]);
    }
}
