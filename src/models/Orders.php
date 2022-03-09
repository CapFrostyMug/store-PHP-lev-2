<?php

namespace app\models;

class Orders extends Model
{
    public $id;
    public $date;
    public $status;
    public $paymentType;
    public $sum;

    public function getTableName()
    {
        return "orders";
    }
}
