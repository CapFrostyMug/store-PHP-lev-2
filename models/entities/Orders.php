<?php

namespace app\models\entities;

use app\models\Entity;

class Orders extends Entity
{
    public $id;
    public $user_name;
    public $phone_num;
    public $session_id;

    protected $props = [
        "user_name" => false,
        "phone_num" => false,
        "session_id" => false,
    ];

    public function __construct($session_id = null, $user_name = null, $phone_num = null)
    {
        $this->session_id = $session_id;
        $this->user_name = $user_name;
        $this->phone_num = $phone_num;
    }
}
