<?php

namespace app\models;

class Orders extends DBModel
{
    public $id;
    public $date;
    public $status;
    public $paymentType;
    public $sum;

    public static function getTableName()
    {
        return "orders";
    }
}
