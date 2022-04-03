<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Carts;
use app\models\Repository;

class CartRepository extends Repository
{
    protected function getEntityClass()
    {
        return Carts::class;
    }

    public static function getCart($session_id)
    {
        $sql = "SELECT carts.id 
                AS carts_id, goods.id good_id, goods.name, goods.description, goods.price 
                FROM `carts`,`goods` 
                WHERE `session_id` = :session_id 
                AND carts.good_id = goods.id";

        return Db::getInstance()->queryAll($sql, ["session_id" => $session_id]);
    }

    protected function getTableName()
    {
        return "carts";
    }
}
