<?php

namespace app\models;

abstract class Entity
{
    protected $props = [];

    public function __set($name, $value)
    {
        // TODO изменять поля только из props
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}
