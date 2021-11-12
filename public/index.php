<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\UserController;
use app\core\Application;

$app = new Application();

$app->router->get("home", "home");
$app->router->get("", "home");
$app->router->get("test", "home");
$app->router->get("index", "home");
$app->router->get("accessDenied", "accessDenied");
$app->router->get("createUser", [UserController::class, "create"]);
$app->router->get("homeUser", [UserController::class, "home"]);
$app->router->post("createUserProcess", [UserController::class, "createProcess"]);

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
