<?php

namespace app\core;

class Model
{
    public $errors;
    public DBConnection $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    public function loadData($data)
    {
        if ($data !== null)
        {
            foreach ($data as $key => $value)
            {
                if (property_exists($this, $key))
                {
                    $this->{$key} = $value;
                }
            }
        }
    }
}