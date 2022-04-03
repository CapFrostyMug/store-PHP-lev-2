<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\GoodRepository;

class GoodController extends Controller
{
    public function actionIndex()
    {
        echo $this->render("index");
    }

    public function actionCatalog()
    {
        $page = (new Request())->getParams()["page"] ?? 0;
        //$catalog = Goods::getAll();
        $catalog = (new GoodRepository())->getLimit(($page + 1) * 5);

        echo $this->render("good/catalog", [
            "catalog" => $catalog,
            "page" => ++$page,
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()["id"];

        $good = (new GoodRepository())->getOne($id);

        echo $this->render("good/card", [
            "good" => $good
        ]);
    }
}
