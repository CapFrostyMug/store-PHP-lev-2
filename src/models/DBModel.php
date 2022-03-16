<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
    abstract public static function getTableName();

    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }

    public static function getWhere($name, $value)
    {
        //
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ["id" => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $params = [];
        $columns = [];

        $tableName = static::getTableName();

        foreach ($this->props as $key => $value) {
            $params[":" . $key] = $this->$key;
            $columns[] = $key;
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
        Db::getInstance()->execute($sql, $params);

        return $this;
    }

    public function update()
    {
        $params = [];
        $columns = [];

        $tableName = static::getTableName();

        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $this->props[$key] = false;
        }
        $columns = implode(", ", $columns);
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        return Db::getInstance()->execute($sql, ["id" => $this->id]);
    }

    public function save()
    {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function insertGetId()
    {
        // return $this->id = Db::getInstance()->lastInsertId();
    }
}
