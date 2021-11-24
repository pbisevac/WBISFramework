<?php

namespace app\models;

use app\core\DBModel;

class NewsLocalizationsModel extends DBModel
{
    public $id_news;
    public $title_news;
    public $content_news;
    public $culture_code;

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return "news_localizations";
    }

    public function attributes(): array
    {
        return [
            "id_news",
            "title_news",
            "content_news",
            "culture_code"
        ];
    }

    public function attributesForUpdate(): array
    {
        return [
            "title_news",
            "content_news",
            "culture_code"
        ];
    }
}