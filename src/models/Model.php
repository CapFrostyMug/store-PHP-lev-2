<?php

namespace src\models;

use src\engine\Db;
use src\interfaces\iModel;

abstract class Model implements iModel
{
    protected $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }


    abstract public function getTableName();

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
}
