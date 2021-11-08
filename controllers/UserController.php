<?php
namespace app\controllers;

use app\core\DBConnection;
use app\core\Request;
use app\core\Router;
use app\models\UserModel;

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

        $params = $result ->fetch_assoc();

        return $this->router->viewWithParams("homeUser", "main", $params);
    }

    public function create()
    {
        return $this->router->view("create", "main");
    }

    public function createProcess()
    {
        $model = new UserModel();
        $model->loadData($this->request->getAll());
//        $model->validate();
//
//        if ($model->errors != null)
//        {
//            return $this->router->viewWithParams("create", "main", $model);
//        }

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