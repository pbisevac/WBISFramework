<?php

namespace app\core;

abstract class DBModel extends Model
{
    public $data_created;
    public $data_updated;
    public $user_created;
    public $user_updated;
    public $active;
    abstract public function rules(): array;
}