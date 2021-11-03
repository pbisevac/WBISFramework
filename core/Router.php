<?php
namespace app\core;

class Router
{
    public Request $request;
    public array $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }
}