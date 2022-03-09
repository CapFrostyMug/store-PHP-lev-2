<?php

namespace app\models;

class Goods extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    //public $image;

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public function getTableName()
    {
        return "goods";
    }
}
