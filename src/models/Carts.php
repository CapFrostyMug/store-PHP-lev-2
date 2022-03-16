<?php

namespace app\models;

use app\engine\Db;

class Carts extends DBModel
{
    public $id;
    public $session_id;
    public $good_id;

    public static function getCart()
    {
        $sql = "SELECT carts.id 
                AS carts_id, goods.id good_id, goods.name, goods.description, goods.price 
                FROM `carts`,`goods` WHERE `session_id` = '111' 
                AND carts.good_id = goods.id";

        return Db::getInstance()->queryAll($sql);
    }

    public static function getTableName()
    {
        return "carts";
    }
}
