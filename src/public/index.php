<?php

use app\models\{Goods, Users, Carts, Orders};
use app\engine\Autoload;

include_once "../engine/Autoload.php";

spl_autoload_register([new Autoload(), "loadClass"]);

/*$good = new Goods("ASUS ROG GX502LXS-HF082T", "Ноутбук", 423190);
var_dump($good->insertOne());*/

/*$user = new Users("user4", 121);
$user->insertOne();*/

/*$good = new Goods();
$good->deleteOne();*/
