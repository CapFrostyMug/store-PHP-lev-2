<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\iModel;

abstract class Model implements iModel
{
    abstract public function getTableName();

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ["id" => $id]);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insertOne()
    {
        $tableName = $this->getTableName();

        $fields = [];
        $rows = [];
        $params = [];

        foreach ($this as $field => $row) {
            if ($field == "id") continue;
            $fields[] = $field;
            $rows[] = ":" . $field;
            $params[$field] = $row;
        }

        $fieldsName = implode(", ", $fields);
        $rowsData = implode(", ", $rows);

        $sql = "INSERT INTO {$tableName} ($fieldsName) VALUES ($rowsData)";
        Db::getInstance()->execute($sql, $params);

        return $this->id = Db::getInstance()->lastInsertId();
    }

    public function deleteOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        Db::getInstance()->execute($sql, ["id" => $id]);

        return $this;
    }
}
