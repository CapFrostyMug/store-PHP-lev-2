<?php

namespace app\interfaces;

interface iModel
{
    public static function getTableName();

    public static function getOne($id);

    public static function getAll();

    public function insert();

    public function update();

    public function delete();

    public function save();
}
