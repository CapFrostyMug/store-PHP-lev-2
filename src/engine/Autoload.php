<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace(["\\", "app/"], ["/", "../"], $className) . ".php";

        if (file_exists($fileName)) {
            require $fileName;
        }
    }
}
