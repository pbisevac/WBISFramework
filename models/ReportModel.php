<?php

namespace app\models;

use app\core\DBModel;

class ReportModel extends DBModel
{
    public $date_from;
    public $date_to;

    public function numberOfNews(ReportModel $model)
    {
        if ($model->date_from == '' or $model->date_to == '')
        {
            $sql = "SELECT MONTHNAME(data_created) as 'month_name', count(id) as 'number_of_news' FROM `news` WHERE `data_created` BETWEEN (NOW() - INTERVAL 7 MONTH) AND NOW() group by MONTHNAME(data_created)";
        }else{
            $sql = "SELECT MONTHNAME(data_created) as 'month_name', count(id) as 'number_of_news' FROM `news` WHERE `data_created` BETWEEN '$model->date_from' AND '$model->date_to' group by MONTHNAME(data_created)";
        }

        $dataResult = $this->db->con->query($sql) or die();

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }

    public function rules(): array
    {
       return [];
    }

    public function tableName()
    {
        return "";
    }

    public function attributes(): array
    {
        return [];
    }

    public function attributesForUpdate(): array
    {
        return [];
    }
}