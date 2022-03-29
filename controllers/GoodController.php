<?php

namespace app\controllers;

use app\models\Goods;

class GoodController extends Controller
{
    public function actionIndex()
    {
        echo $this->render("index");
    }

    public function actionCatalog()
    {
        $page = $_GET["page"] ?? 0;
        //$catalog = Goods::getAll();
        $catalog = Goods::getLimit(($page + 1) * 5);

        echo $this->render("good/catalog", [
            "catalog" => $catalog,
            "page" => ++$page,
        ]);
    }

    public function actionCard()
    {
        //$id = (new Request())->getParams()['id'];

        $id = $_GET["id"];
        $good = Goods::getOne($id);

        echo $this->render("good/card", [
            "good" => $good
        ]);
    }
}
