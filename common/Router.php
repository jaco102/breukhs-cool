<?php

namespace Common;

class Router
{
    private array $routes = [];
    private array $pathParams;
    public Controller $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function get($pathServer, $actionServer)
    {
        $this->routes['GET'][] = [$pathServer, $actionServer];
    }

    public function post($pathServer, $actionServer)
    {
        $this->routes['POST'][] = [$pathServer, $actionServer];
    }

    public function resolve()
    {
        $pathUser = $_SERVER['REQUEST_URI'];
        $methodUser = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$methodUser] as $route) {
            $pathServer = $route[0];
            $actionServer = $route[1];

            if ($this->checkRoute($pathServer, $pathUser)) {
                $this->execute($actionServer);
                return;
            }
        }

        $this->controller->render('404');
    }

    public function checkRoute($pathServer, $pathUser)
    {
        $pathServer = preg_replace('#:([\w]+)#', '([^/]+)', $pathServer);
        $pathRegex = "#^$pathServer$#";

        if (preg_match($pathRegex, $pathUser, $pathParams)) {
            $this->pathParams = array_slice($pathParams, 1);
            return true;
        }

        return false;
    }

    public function execute($action)
    {
        $params = explode('@', $action);
        $controller ='App\Controller\\' . $params[0];
        $controller = new $controller();
        $method = $params[1];
        $json = json_decode(file_get_contents("php://input"), true) ?? [];
        $body = array_merge($json, $_POST);

        isset($this->pathParams[1]) ? $controller->$method($body, $this->pathParams) : $controller->$method($body);
    }
}
