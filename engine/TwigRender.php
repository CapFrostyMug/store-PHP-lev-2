<?php

namespace app\engine;

use app\interfaces\iRender;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRender implements iRender
{
    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader("../twigTemplates/");
        $this->twig = new Environment($loader);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->twig->render($template . ".twig", $params);
    }
}
