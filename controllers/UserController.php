<?php
namespace app\controllers;

use app\core\Router;

class UserController
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function create()
    {
        return $this->router->view("create", "main");
    }

    public function createProcess()
    {
    }

    public function edit()
    {
        return $this->router->view("edit", "main");
    }

    public function delete()
    {
        return $this->router->view("delete", "main");
    }
}