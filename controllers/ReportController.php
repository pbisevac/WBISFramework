<?php

namespace app\controllers;

use app\core\Controller;
use app\models\ReportModel;

class ReportController  extends  Controller
{
    public function home()
    {
        return $this->router->viewWithParams("reports/home", "main", null);
    }


    public function numberOfNews()
    {
        $model = new ReportModel();
        $model->loadData($this->request->getAll());

        echo json_encode($model->numberOfNews($model)); exit;
    }

    public function authorize(): array
    {
        return [
            "guest"
        ];
    }
}