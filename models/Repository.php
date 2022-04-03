<?php

namespace app\models;

use app\engine\Db;

abstract class Repository
{
    abstract protected function getTableName();
    abstract protected function getEntityClass();

    public function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }

    public function getCountWhere($name, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT COUNT(id) AS count FROM {$tableName} WHERE {$name} = :value";
        return Db::getInstance()->queryOne($sql, ["value" => $value])["count"];
    }

    public function getWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        var_dump($sql);
        return Db::getInstance()->queryOneObject($sql, ["value" => $value], $this->getEntityClass());
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ["id" => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert(Entity $entity)
    {
        $params = [];
        $columns = [];

        $tableName = $this->getTableName();

        foreach ($entity->props as $key => $value) {
            $params[":" . $key] = $entity->$key;
            $columns[] = $key;
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
        Db::getInstance()->execute($sql, $params);

        $entity->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function update(Entity $entity)
    {
        $params = [];
        $columns = [];

        $tableName = $this->getTableName();

        foreach ($entity->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $entity->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $this->props[$key] = false;
        }

        $params["id"] = $entity->id;
        $columns = implode(", ", $columns);

        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function delete(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        return Db::getInstance()->execute($sql, ["id" => $entity->id]);
    }

    public function save(Entity $entity)
    {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
}
