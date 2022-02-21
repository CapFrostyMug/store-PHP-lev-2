<?php

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A
{
}

$a1 = new A;
$b1 = new B;

$a1->foo(); // echo = 1
$b1->foo(); // echo = 1
$a1->foo(); // echo = 2
$b1->foo(); // echo = 2

// Смотрел, смотрел, но так и не понял, в чем существенное отличие от кода в предыдущем задании:) Единственное,
// отсутствуют круглые скобки в момент создания объектов класса, но это не критично.
