<?php
session_start();

use app\models\{Goods, Users, Carts, Orders};
use app\engine\{Autoload, Render, TwigRender};

// TODO сформировать абсолютный путь.
include_once "../engine/Autoload.php";
include_once "../config/config.php";
include_once "../vendor/autoload.php";

spl_autoload_register([new Autoload(), "loadClass"]);

$request = new \app\engine\Request();

$controllerName = $request->getControllerName() ?: "good";
$actionName = $request->getActionName();

/*$controllerName = $_GET["c"] ?: "good";
$actionName = $_GET["a"];*/

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "Контроллер отсутствует";
}
