<?php

namespace app\models;

use app\core\DBModel;

class NewsCategoryModel extends DBModel
{
    public $id_news;
    public $id_category;

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return "news_category";
    }

    public function attributes(): array
    {
        return [
            "id_news",
            "id_category"
        ];
    }

    public function attributesForUpdate(): array
    {
        return [
            "active"
        ];
    }
}