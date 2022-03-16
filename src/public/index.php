<?php

use app\models\{Goods, Users, Carts, Orders};
use app\engine\Autoload;

include_once "../engine/Autoload.php";
include_once "../config/config.php";

spl_autoload_register([new Autoload(), "loadClass"]);

// INSERT
/*$good = new Goods("Русь", "ЭВМ", 100500);
$good->save();
die();*/

// UPDATE
/*$good = Goods::getOne(1);
$good->price = 999;
$good->save();*/

$controllerName = $_GET["c"] ?: "good";
$actionName = $_GET["a"];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "Контроллер отсутствует";
}
