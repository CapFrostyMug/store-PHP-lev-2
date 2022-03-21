<?php

namespace app\engine;

use app\interfaces\iRender;

class Render implements iRender
{
    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = VIEWS_DIR . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}
