<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\AuthModel;
use app\models\NewsManagementModel;

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
        $model = new NewsManagementModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !== null)
        {
            Application::$app->session->setFlash("error", "Neuspesno kreirana vest!");
            return $this->router->viewWithParams("newsmanagement/create", "main", $model);
        }

        if (!$model->createNews($model))
        {
            Application::$app->session->setFlash("error", "Neuspesno kreirana vest!");
            return $this->router->viewWithParams("newsmanagement/create", "main", $model);
        }

        Application::$app->session->setFlash("success", "Uspesno kreirana vest!");

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
            "admin"
        ];
    }
}