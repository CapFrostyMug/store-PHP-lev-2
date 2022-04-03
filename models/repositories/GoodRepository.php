<?php

namespace app\models\repositories;

use app\models\entities\Goods;
use app\models\Repository;

class GoodRepository extends Repository
{
    protected function getEntityClass()
    {
        return Goods::class;
    }

    protected function getTableName()
    {
        return "goods";
    }
}
