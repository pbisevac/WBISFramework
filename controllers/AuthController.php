<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\RegistrationModel;

class AuthController extends  Controller
{

    public function accessDenied()
    {
        return $this->router->view("accessDenied", "error");
    }

    public function notFound()
    {
        http_response_code(404);
        return $this->router->view("notFound", "error");
    }

    public function login()
    {
        return $this->router->view("login", "auth");
    }

    public function registration()
    {
        return $this->router->view("registration", "auth");
    }

    public function loginProcess()
    {
        return $this->router->view("notFound", "auth");
    }

    public function registrationProcess()
    {
        $model = new RegistrationModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !== null)
        {
            Application::$app->session->setFlash("error", "Neuspesno Kreiran user!");
            return $this->router->viewWithParams("registration", "auth", $model);
        }

        $model->create($model);

        Application::$app->session->setFlash("success", "Uspesno Kreiran user!");

        return $this->router->viewWithParams("registration", "auth", $model);
    }

    public function authorize(): array
    {
        return [
            "Guest"
        ];
    }
}