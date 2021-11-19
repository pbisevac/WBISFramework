<?php

namespace app\models;

use app\core\DBModel;

class NewsLocalizations extends DBModel
{
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