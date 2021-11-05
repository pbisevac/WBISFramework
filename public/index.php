<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$app = new Application();

$app->router->get("home", "home");
$app->router->get("", "home");
$app->router->get("test", "home");
$app->router->get("index", "home");
$app->router->get("create", "create");

//echo "<pre>";
//var_dump($app ->router->request->getPath());
//echo "</pre>";
//
//

$app->run();
//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";
//exit;
