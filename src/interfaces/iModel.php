<?php

namespace src\interfaces;

interface iModel
{
    public function getTableName();

    public function getOne($id);

    public function getAll();
}
