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
}