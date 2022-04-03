<?php

namespace app\engine;

class Request // Данный класс содержит все данные, приходящие от пользователя
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;

    protected $method;
    protected $params = []; // $_REQUEST, т.е. и GET, и POST

    public function __construct()
    {
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        $this->requestString = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];

        $url = explode("/", $this->requestString);

        $this->controllerName = $url[1];
        $this->actionName = $url[2];

        $this->params = $_REQUEST;

        $data = json_decode(file_get_contents("php://input"));
        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->params[$key] = $value;
            }
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}
