<?php

namespace app\models;

class Carts extends Model
{
    public $id;
    public $good_id;
    public $count;
    public $sum;

    public function getTableName()
    {
        return "carts";
    }
}
