<?php

namespace src\models;

class Carts extends Model
{
    public $id;
    public $goodId;
    public $count;
    public $sum;

    public function getTableName()
    {
        return "carts";
    }
}
