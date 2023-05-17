<?php

namespace Common;

class Application
{
    public Router $router;
    public Controller $controller;

    public function __construct()
    {
        $this->controller = new Controller();
        $this->router = new Router($this->controller);
    }

    public function run()
    {
        $this->router->resolve();
    }
}
