<?php

namespace app\models;

use app\core\DBModel;

class NewsModel extends DBModel
{
    public $number_of_rows;
    public $page_number;
    public $start_on;
    public $search;
    public $title_news;
    public $content_news;

    public function getNews()
    {
        $this->number_of_rows = 10;
        $this->start_on =  $this->page_number *  $this->number_of_rows;

        if ($this->search !=null or $this->search != "")
        {
            $sqlString = "
                select  nl.title_news,
                        nl.content_news
                from  news n
                inner join news_localizations nl on n.id = nl.id_news
                where nl.title_news like '%$this->search%' or nl.content_news like '%$this->search%'";
        }
        else
        {
            $sqlString = "
                select  nl.title_news,
                        nl.content_news
                from  news n
                inner join news_localizations nl on n.id = nl.id_news
                where nl.title_news like '%$this->search%' or nl.content_news like '%$this->search%' LIMIT $this->start_on, $this->number_of_rows";
        }

        $dbData = $this->db->con->query($sqlString) or die($this->db->con->error);

        $resultArray = [];

        while ($result = $dbData->fetch_assoc()) {
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