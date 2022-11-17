<?php
session_start();

use app\engine\{Autoload, Render, Request, TwigRender};

// TODO сформировать абсолютный путь.
// include_once "../engine/Autoload.php";
include_once "../config/config.php";
include_once "../vendor/autoload.php";

spl_autoload_register([new Autoload(), "loadClass"]);

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: "good";
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        echo "Контроллер отсутствует";
    }
} catch (PDOException $e) {
    var_dump($e);
} catch (Exception $e) { // Родитель (Exception) идёт в конце, после наследника (PDOException).
    echo $e->getPrevious();
}
