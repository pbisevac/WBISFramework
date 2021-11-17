<?php

namespace app\models;

use app\core\DBModel;

class LoggedInUserModel extends DBModel
{

    public $email;
    public $full_name;
    public $address;
    public array $roles = [];

    public function getUser($email)
    {
        $result = $this->db->con->query("select  u.id,
                                                       u.full_name,
                                                       u.email,
                                                       u.address,
                                                       r.name
                                                from users u
                                                inner join users_roles ur on u.id= ur.id_user
                                                inner join roles r on ur.id_role = r.id
                                                where u.email = '$email';") or die($this->db->con->error);

        while ($row = $result -> fetch_assoc())
        {
            if ($this->email === null)
            {
                $this->loadData($row);
            }

            array_push($this->roles, $row["name"]);
        }

        return $this;
    }

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return "users";
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