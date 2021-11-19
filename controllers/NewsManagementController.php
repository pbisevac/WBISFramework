<?php

namespace app\controllers;

use app\core\Controller;

class NewsManagementController extends Controller
{
    public function home()
    {
        return $this->router->view("newsmanagement/home", "main");
    }

    public function single()
    {
        return $this->router->view("newsmanagement/single", "main");
    }

    public function create()
    {
        return $this->router->view("newsmanagement/create", "main");
    }

    public function createProcess()
    {
        return $this->router->viewWithParams("newsmanagement/create", "main", null);
    }

    public function edit()
    {
        return $this->router->view("newsmanagement/edit", "main");
    }

    public function editProcess()
    {
        return $this->router->view("newsmanagement/edit", "main");
    }

    public function delete()
    {
        return $this->router->view("newsmanagement/delete", "main");
    }

    public function deleteProcess()
    {
        return $this->router->view("newsmanagement/delete", "main");
    }

    public function authorize(): array
    {
        return [
            "guest"
        ];
    }
}