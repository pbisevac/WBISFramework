<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\UserModel;

class UserController extends Controller
{
    public function home()
    {
        $result = $this->db->mysqli->query("SELECT * FROM users") or die($this->db->mysqli->error);

        $params = $result ->fetch_assoc();

        return $this->router->viewWithParams("home", "main", $params);
    }

    public function create()
    {
        return $this->router->viewWithParams("create", "main", new UserModel());
    }

    public function createProcess()
    {
        $model = new UserModel();
        $model->loadData($this->request->getAll());
        $model->validate();

        if ($model->errors !== null)
        {
            return $this->router->viewWithParams("create", "main", $model);
        }

        $this->db->mysqli->query("INSERT INTO users (full_name, email, password, address) VALUES ('$model->full_name', '$model->email', '$model->password', '$model->address')") or die($this->db->mysqli->error);

        Application::$app->session->setFlash("user", "Uspesno Kreiran user!");

        return $this->router->viewWithParams("create", "main", $model);
    }

    public function edit()
    {
        return $this->router->view("edit", "main");
    }

    public function delete()
    {
        return $this->router->view("delete", "main");
    }

    public function authorize(): array
    {
       return [
           "admin",
           "korisnik"
       ];
    }
}