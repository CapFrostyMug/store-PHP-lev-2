<?php

namespace app\models\entities;

use app\models\Entity;

class Users extends Entity
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        "login" => false,
        "pass" => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }
}
