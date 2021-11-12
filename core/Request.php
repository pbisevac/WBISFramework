<?php
namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");

        if ($position === false)
        {
            return substr($path, 1);
        }

        $path = substr($path, 1, $position-1);

        return $path;
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getOne($key)
    {
        return $_REQUEST[$key];
    }

    public function getAll()
    {
        return $_REQUEST;
    }

    public function redirect($path)
    {
        header("location:" . $path);
    }
}