<?php

namespace app\models;

use app\core\DBModel;

class SubscriptionModel extends DBModel
{

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