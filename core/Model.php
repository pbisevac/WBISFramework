<?php

namespace app\core;

abstract class Model
{
    public $errors;
    public DBConnection $db;

    public const RULE_EMAIL = "email";
    public const RULE_EMAIL_UNIQUE = "email_unique";
    public const RULE_REQUIRED = "required";

    abstract public function rules() : array;

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

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules)
        {
            $valueForAttribute = $this->{$attribute};

            foreach ($rules as $rule)
            {
                if ($rule === self::RULE_REQUIRED && !$valueForAttribute)
                    $this->errors[$attribute][] = "Polje  $attribute je obavezno!";

                if ($rule === self::RULE_EMAIL && !filter_var($valueForAttribute, FILTER_VALIDATE_EMAIL))
                    $this->errors[$attribute][] = "Polje  $attribute mora biti u email formatu!";

                if ($rule === self::RULE_EMAIL_UNIQUE && !$this->findEmail($valueForAttribute))
                    $this->errors[$attribute][] = "Polje  $attribute mora jedinstveno!";
            }
        }
    }
}