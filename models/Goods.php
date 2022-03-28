<?php

namespace app\models;

class Goods extends DBModel
{
    protected $_id;
    protected $name;
    protected $description;
    protected $price;
    //public $image;

    protected $props = [
        "name" => false,
        "description" => false,
        "price" => false,
    ];

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public static function getTableName()
    {
        return "goods";
    }
}
