<?php

namespace app\controllers;

use app\core\Controller;
use app\models\CategoryModel;

class SettingsController extends Controller
{
    public function home()
    {
        return $this->router->view("settings/home", "main");
    }

    public function getAll()
    {
        $model = new CategoryModel();
        $data = $this->request->getOne("data");

        $allData = $model->getAllWithStatement(" active = 1 and (category_name like '%$data%' or description like '%$data%')");

        echo json_encode($allData); exit;
    }

    public function single()
    {
        return $this->router->view("settings/single", "main");
    }

    public function create()
    {
        return $this->router->view("settings/create", "main");
    }

    public function createProcess()
    {
        return $this->router->viewWithParams("settings/create", "main", null);
    }

    public function edit()
    {
        return $this->router->view("settings/edit", "main");
    }

    public function editProcess()
    {
        return $this->router->view("settings/edit", "main");
    }

    public function delete()
    {
        return $this->router->view("news/delete", "main");
    }

    public function deleteProcess()
    {
        return $this->router->view("settings/delete", "main");
    }

    public function authorize(): array
    {
        return [
            "guest"
        ];
    }
}