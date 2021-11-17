<?php

namespace app\models;

use app\core\DBModel;

class AuthModel extends DBModel
{
    public $email;
    public $password;

    public function rules(): array
    {
        return [
            "email" => [self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED]
        ];
    }

    public function registration(AuthModel $model)
    {
        $model->password = password_hash($model->password, PASSWORD_DEFAULT);
        $date = date('Y-m-d H-i-s');

        $created_user = $model->create();

        $result = $this->db->con->query("SELECT id FROM roles WHERE name = 'korisnik'") or die($this->db->con->error);

        $role_result = $result->fetch_assoc();

        $result = $this->db->con->query("SELECT id FROM users WHERE email = '$model->email'") or die($this->db->con->error);

        $id_role = $role_result["id"];
        $user_result = $result->fetch_assoc();
        $id_user = $user_result["id"];

        $users_roles = $this->db->con->query("INSERT INTO users_roles (id_user, id_role, active, data_created, data_updated, user_created, user_updated, valid_from, valid_to) VALUES ($id_user, $id_role, true, '$date', '$date', 1, 1, '$date', '2025-01-01 12-00-00')") or die($this->db->con->error);
    }

    public function login(AuthModel $model)
    {
      $modelFromDB = new AuthModel();

      $modelFromDB->loadData($modelFromDB->getOne("email = '$model->email'"));


      if ($modelFromDB->email !== null)
      {
          if (password_verify($model->password, $modelFromDB->password))
          {
              return true;
          }
      }

      return false;
    }

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "email",
            "password",
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
            "password",
            "data_updated",
            "user_updated",
            "active"
        ];
    }
}