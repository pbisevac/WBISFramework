<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\NewsModel;
use app\models\UserModel;

class NewsController extends Controller
{
    public function home()
    {
        return $this->router->view("news/home", "empty");
    }

    public function getNews()
    {
        $model = new NewsModel();

        $model->loadData($this->request->getAll());

        echo json_encode($model->getNews()); exit;
    }

    public function single()
    {
        return $this->router->view("news/single", "main");
    }

    public function create()
    {
        return $this->router->view("news/create", "main");
    }

    public function createProcess()
    {
        return $this->router->viewWithParams("news/create", "main", null);
    }

    public function edit()
    {
        return $this->router->view("news/edit", "main");
    }

    public function editProcess()
    {
        return $this->router->view("news/edit", "main");
    }

    public function delete()
    {
        return $this->router->view("news/delete", "main");
    }

    public function deleteProcess()
    {
        return $this->router->view("news/delete", "main");
    }

    public function authorize(): array
    {
        return [
            "guest"
        ];
    }
}