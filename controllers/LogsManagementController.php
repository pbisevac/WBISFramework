<?php

namespace app\controllers;

use app\core\Controller;

class LogsManagementController extends Controller
{
    public function home()
    {
        return $this->router->view("logsmanagement/home", "main");
    }

    public function single()
    {
        return $this->router->view("logsmanagement/single", "main");
    }

    public function create()
    {
        return $this->router->view("logsmanagement/create", "main");
    }

    public function createProcess()
    {
        return $this->router->viewWithParams("logsmanagement/create", "main", null);
    }

    public function edit()
    {
        return $this->router->view("logsmanagement/edit", "main");
    }

    public function editProcess()
    {
        return $this->router->view("logsmanagement/edit", "main");
    }

    public function delete()
    {
        return $this->router->view("logsmanagement/delete", "main");
    }

    public function deleteProcess()
    {
        return $this->router->view("logsmanagement/delete", "main");
    }

    public function authorize(): array
    {
        return [
            "guest"
        ];
    }
}