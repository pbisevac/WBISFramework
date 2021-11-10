<?php
namespace app\models;

use app\core\DBModel;

class UserModel extends DBModel
{
    public $id;
    public $full_name;
    public $email;
    public $password;
    public $address;

    public function rules(): array
    {
        return [
            "email" => [self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED, self::RULE_EMAIL]
        ];
    }
}