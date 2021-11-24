<?php

namespace app\models;

use app\core\DBModel;

class NewsManagementModel extends DBModel
{
    public $title_news;
    public $content_news;
    public $multimedia_path;
    public $culture_code;
    public array $categories = [];

    public function rules(): array
    {
        return [
            "title_news" => [self::RULE_REQUIRED],
            "content_news" => [self::RULE_REQUIRED],
            "categories" => [self::RULE_REQUIRED]
        ];
    }

    public function tableName()
    {
        return "news";
    }

    public function attributes(): array
    {
        return [
            "multimedia_path",
            "data_created",
            "data_updated",
            "user_created",
            "user_updated",
            "active"
        ];
    }

    public function attributesForUpdate(): array
    {
        return [
            "multimedia_path",
            "data_updated",
            "user_updated",
            "active"
        ];
    }

    public function createNews(NewsManagementModel $model)
    {
        $news_id = 0;

        if ($model->create())
        {
            $news_id = mysqli_insert_id($model->db->con);

            $news_localization_model = new NewsLocalizationsModel();
            $news_localization_model->loadData($model);
            $news_localization_model->id_news = $news_id;
            //var_dump($news_localization_model); exit;
            $news_localization_model->create();
        }

        if ($news_id == 0)
            return false;

        foreach ($this->categories as $category)
        {

            $news_category_model = new NewsCategoryModel();

            $news_category_model->id_news = $news_id;
            $news_category_model->id_category = $category;

            $news_category_model->create();
        }

        return true;
    }
}