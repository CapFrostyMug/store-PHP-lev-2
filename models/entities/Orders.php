<?php

namespace app\models\entities;

use app\models\Entity;

class Orders extends Entity
{
    public $id;
    public $date;
    public $status;
    public $paymentType;
    public $sum;
}
