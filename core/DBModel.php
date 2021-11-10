<?php

namespace app\core;

abstract class DBModel extends Model
{

    abstract public function rules(): array;
}