<?php
session_start();

use app\models\{Goods, Users, Carts, Orders};
use app\engine\Autoload;
use app\engine\Render;
use app\engine\TwigRender;

include_once "../engine/Autoload.php";
include_once "../config/config.php";

spl_autoload_register([new Autoload(), "loadClass"]);
include "../../vendor/autoload.php";

$controllerName = $_GET["c"] ?: "good";
$actionName = $_GET["a"];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    echo "Контроллер отсутствует";
}
