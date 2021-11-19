<?php

namespace app\controllers;

use app\core\Controller;

class UserManagementController extends Controller
{
    public function home()
    {
        return $this->router->view("usermanagement/home", "main");
    }

    public function single()
    {
        return $this->router->view("usermanagement/single", "main");
    }

    public function create()
    {
        return $this->router->view("usermanagement/create", "main");
    }

    public function createProcess()
    {
        return $this->router->viewWithParams("usermanagement/create", "main", null);
    }

    public function edit()
    {
        return $this->router->view("usermanagement/edit", "main");
    }

    public function editProcess()
    {
        return $this->router->view("usermanagement/edit", "main");
    }

    public function delete()
    {
        return $this->router->view("usermanagement/delete", "main");
    }

    public function deleteProcess()
    {
        return $this->router->view("usermanagement/delete", "main");
    }

    public function authorize(): array
    {
        return [
            "guest"
        ];
    }
}