<?php

namespace app\interfaces;

interface iModel
{
    public function getTableName();

    public function getOne($id);

    public function getAll();

    public function deleteOne($id);

    public function insertOne();
}
