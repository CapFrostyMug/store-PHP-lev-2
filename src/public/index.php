<?php

use src\models\{Goods, Users, Carts, Orders};
use src\engine\Db;

include_once "../engine/Autoload.php";

spl_autoload_register([new src\engine\Autoload(), "loadClass"]);

$db = new Db();

$good = new Goods($db);
echo $good->getOne(1);
echo $good->getAll();

$user = new Users($db);
echo $user->getOne(1);
echo $user->getAll();

$cart = new Carts($db);
echo $cart->getOne(1);
echo $cart->getAll();

$order = new Orders($db);
echo $order->getOne(1);
echo $order->getAll();
