<?php
namespace app\controllers;

use app\core\DBConnection;
use app\core\Router;

class UserController
{
    public Router $router;
    public DBConnection $db;

    public function __construct()
    {
        $this->router = new Router();
        $this->db = new DBConnection();
    }

    public function create()
    {
        return $this->router->view("create", "main");
    }

    public function createProcess()
    {
        
        var_dump($_REQUEST); exit;
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