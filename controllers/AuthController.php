<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\AuthModel;
use app\models\LoggedInUserModel;

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
        if (Application::$app->session->get("logged_in_user"))
        {
            $this->request->redirect("home");
        }

        return $this->router->view("login", "auth", new AuthModel());
    }

    public function logout()
    {
        if (Application::$app->session->get("logged_in_user"))
        {
            Application::$app->session->remove("logged_in_user");
        }

        $this->request->redirect("login");
    }

    public function registration()
    {
        return $this->router->view("registration", "auth", new AuthModel());
    }

    public function loginProcess()
    {
        $model = new AuthModel();
        $model->loadData($this->request->getAll());

        $model->validate();
        if ($model->errors !== null)
        {
            Application::$app->session->setFlash("error", "Neuspesno ulogovan user!");
            return $this->router->viewWithParams("login", "auth", $model);
        }

        if (!$model->login($model))
        {
            Application::$app->session->setFlash("error", "Neuspesno ulogovan user!");
            return $this->router->viewWithParams("login", "auth", $model);
        }

        $logedInUserModel = new LoggedInUserModel();

        Application::$app->session->set("logged_in_user", $logedInUserModel->getUser($model->email));

        $this->request->redirect("/home");
    }

    public function registrationProcess()
    {
        $model = new AuthModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !== null)
        {
            Application::$app->session->setFlash("error", "Neuspesno Kreiran user!");
            return $this->router->viewWithParams("registration", "auth", $model);
        }

        $model->registration($model);

        Application::$app->session->setFlash("success", "Uspesno Kreiran user!");

        return $this->router->viewWithParams("registration", "auth", $model);
    }

    public function authorize(): array
    {
        return [
            "guest"
        ];
    }
}