<?php

namespace app\models;

use app\engine\Db;

class Carts extends DBModel
{
    protected $id;
    protected $session_id;
    protected $good_id;

    protected $props = [
        "session_id" => false,
        "good_id" => false,
    ];

    public function __construct($session_id = null, $good_id = null)
    {
        $this->session_id = $session_id;
        $this->good_id = $good_id;
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

    public static function getTableName()
    {
        return "carts";
    }
}
