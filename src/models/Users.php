<?php

namespace app\models;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }


    public function getTableName()
    {
        return "users";
    }
}
