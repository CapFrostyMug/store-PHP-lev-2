<?php

namespace app\models\entities;

use app\models\Entity;

class Carts extends Entity
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
}
