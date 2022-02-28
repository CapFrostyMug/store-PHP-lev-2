<?php

namespace src\engine;

class Autoload
{
    public function loadClass($className)
    {
        $root = $_SERVER["DOCUMENT_ROOT"];
        $ds = DIRECTORY_SEPARATOR;
        $fileName = $root . $ds . str_replace("\\", $ds, $className) . ".php";

        if (file_exists($fileName)) {
            require $fileName;
        }
    }
}
