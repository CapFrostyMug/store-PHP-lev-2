<?php

use \PHPUnit\Framework\TestCase;
use app\models\entities\Goods;

class GoodTest extends TestCase
{
    public function testProps()
    {
        $good = new Goods();

        foreach ($good->props as $key => $value) {
            $this->assertFalse($value, $value);
        }
    }

    public function testGoodConstruct()
    {
        $name = "Lenovo ThinkPad P1 Gen 4";
        $good = new Goods($name);
        $this->assertEquals($name, $good->name);
    }
}
