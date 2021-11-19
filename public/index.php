<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\NewsController;
use app\controllers\NewsManagementController;
use app\controllers\SettingsController;
use app\controllers\UserController;
use app\core\Application;

$app = new Application();

$app->router->get("home", "home");
$app->router->get("", "home");
$app->router->get("test", "home");
$app->router->get("index", "home");
$app->router->get("accessDenied", [AuthController::class, "accessDenied"]);
$app->router->get("notFound", [AuthController::class, "notFound"]);
$app->router->get("registration", [AuthController::class, "registration"]);
$app->router->get("login", [AuthController::class, "login"]);
$app->router->get("logout", [AuthController::class, "logout"]);
$app->router->get("createUser", [UserController::class, "create"]);
$app->router->get("homeUser", [UserController::class, "home"]);
$app->router->get("newsmanagement/create", [NewsManagementController::class, "create"]);
$app->router->get("api/categories/getall", [SettingsController::class, "getAll"]);
$app->router->post("createUserProcess", [UserController::class, "createProcess"]);
$app->router->post("registrationProcess", [AuthController::class, "registrationProcess"]);
$app->router->post("loginProcess", [AuthController::class, "loginProcess"]);
$app->router->post("newsmanagement/createProcess", [NewsManagementController::class, "createProcess"]);

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
