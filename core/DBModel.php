<?php

namespace app\core;

abstract class DBModel extends Model
{
    public $id;
    public $data_created;
    public $data_updated;
    public $user_created;
    public $user_updated;
    public $active;
    abstract public function rules(): array;
    abstract public function tableName();
    abstract public function attributes(): array;
    abstract public function attributesForUpdate(): array;

    public function update($where)
    {
        if ( Application::$app->session->getFlash("logged_in_user"))
        {
            return false;
        }

        $table_name = $this->tableName();
        $attributes = $this->attributesForUpdate();

        $this->data_updated = date('Y-m-d H-i-s');
        $this->user_updated = Application::$app->session->get("logged_in_user")->id;

        $sql = "UPDATE $table_name SET ";

        foreach ($attributes as $attribute)
        {
            $sql .=  $attribute;
            $sql .= " = ";
            $sql .= (is_numeric($this->{$attribute}) or is_bool($this->{$attribute})) ?  $this->{$attribute} : '"' . $this->{$attribute} . '"' . ", ";
        }

        $sql = substr_replace($sql, ";", -2);

        $this->db->con->query($sql . $where ) or die();

        return true;
    }

    public function create()
    {
        $table_name = $this->tableName();
        $attributes = $this->attributes();
        $values = array_map(fn($attr) => ":$attr", $attributes);

        $this->data_created = date('Y-m-d H-i-s');
        $this->data_updated = date('Y-m-d H-i-s');
        $this->user_created = Application::$app->session->get("logged_in_user")->id ?? 1;
        $this->user_updated = Application::$app->session->get("logged_in_user")->id ?? 1;
        $this->active = true;

        $sql = "INSERT INTO $table_name (" . implode(',', $attributes) . ") VALUES (" . implode(',', $values) . ")";

        foreach ($attributes as $attribute)
        {
            $sql = str_replace(":$attribute", (is_numeric($this->{$attribute}) or is_bool($this->{$attribute})) ?  $this->{$attribute} : '"' . $this->{$attribute} . '"', $sql);
        }

        $this->db->con->query($sql) or die();

        return true;
    }

    public function getAll()
    {
        $table_name = $this->tableName();

        $sql = "SELECT * FROM $table_name";

        $result = $this->db->con->query($sql) or die();
        $resultArray = [];

        while ($results = $result->fetch_assoc())
        {
            array_push($resultArray, $results);
        }

        return $resultArray;
    }

    public function getAllWithStatement($where)
    {
        $table_name = $this->tableName();

        $sql = "SELECT * FROM $table_name where $where";

        $result = $this->db->con->query($sql) or die();
        $resultArray = [];

        while ($results = $result->fetch_assoc())
        {
            array_push($resultArray, $results);
        }

        return $resultArray;
    }

    public function getOne($where)
    {
        $table_name = $this->tableName();

        $sql = "SELECT * FROM $table_name WHERE $where";

        $result = $this->db->con->query($sql) or die();

        return $result->fetch_assoc();
    }

    public function delete($where)
    {
        $table_name = $this->tableName();

        $sql = "DELETE FROM $table_name WHERE $where";

        $result = $this->db->con->query($sql) or die();

        return true;
    }

    public function findEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = $this->db->con->query($sql) or die();

        if (mysqli_num_rows($result) > 0)
        {
            return false;
        }

        return true;
    }
}