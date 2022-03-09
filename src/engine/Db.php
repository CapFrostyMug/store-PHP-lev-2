<?php

namespace app\engine;

use app\traits\tSingleton;

class Db
{
    private $config = [
        "driver" => "mysql",
        "host" => "localhost",
        "login" => "root",
        "password" => "",
        "database" => "php_pro",
        "charset" => "utf8",
    ];

    use tSingleton;

    private $connection = null;

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config["driver"],
            $this->config["host"],
            $this->config["database"],
            $this->config["charset"],
        );
    }

    private function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection =
                new \PDO($this->prepareDsnString(),
                    $this->config["login"],
                    $this->config["password"]
                );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }


    private function query($sql, $params) // Через данный метод проходят ВСЕ запросы
    {
        $STH = $this->getConnection()->prepare($sql);
        $STH->execute($params);
        return $STH;
    }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params = []) // Сюда будут приходить UPDATE, DELETE, INSERT
    {
        return $this->query($sql, $params)->rowCount();
    }
}
