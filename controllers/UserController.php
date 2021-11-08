<?php
namespace app\controllers;

use app\core\DBConnection;
use app\core\Request;
use app\core\Router;

class UserController
{
    public Router $router;
    public Request $request;
    public DBConnection $db;

    public function __construct()
    {
        $this->router = new Router();
        $this->db = new DBConnection();
        $this->request = new Request();
    }

    public function home()
    {
        $result = $this->db->mysqli->query("SELECT * FROM users") or die($this->db->mysqli->error);

        return $this->router->view("homeUser", "main");
    }

    public function create()
    {
        return $this->router->view("create", "main");
    }

    public function createProcess()
    {
        $fullname = $this->request->getOne("fullname");
        $email = $this->request->getOne("email");
        $passowrd = $this->request->getOne("password");
        $address = $this->request->getOne("address");

        $this->db->mysqli->query("INSERT INTO users (full_name, email, password, adress) VALUES ('$fullname', '$email', '$passowrd', '$address')") or die($this->db->mysqli->error);

        return $this->router->view("create", "main");
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