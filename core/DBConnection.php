<?php

namespace app\core;

use mysqli;

class DBConnection
{
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "news") or die(mysqli_error($this->mysqli));
    }

    public function conn()
    {
        $mysqlii = new mysqli("localhost", "root", "", "news") or die(mysqli_error($mysqlii));

        return $mysqlii;
    }
}