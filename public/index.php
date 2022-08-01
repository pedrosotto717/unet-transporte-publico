<?php

use app\utils\Views;

require __DIR__ . '/../app/utils/Autoload.php';
ini_set('session.cookie_httponly', 1);

// Show all errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$app = new \app\utils\Application();

$app->router->get("/admin", [\app\controllers\AdminController::class, "index"]);

$app->router->get("/", function ($params) {
  return Views::render("home");
});

$app->router->get("/login", function ($params) {
  return Views::render("login");
});

$app->router->post("/auth", [\app\controllers\AuthController::class, "auth"]);

$app->router->get("/logout", [\app\controllers\AuthController::class, "logout"]);

$app->router->get("/dashboard", function ($params) {
  return Views::render("dashboard");
});


// Business Routes
$app->router->post("/business", [\app\controllers\BusinessController::class, "store"]);


// Place Routes|
$app->router->post("/places", [\app\controllers\PlaceController::class, "store"]);


//users Routes
$app->router->post("/users", [\app\controllers\UserController::class, "store"]);

// Routes Routes
$app->router->post("/routes", [\app\controllers\RoutesController::class, "store"]);
$app->router->post("/routes-search", [\app\controllers\RoutesController::class, "getRoutesByPlaces"]);


// Suggest Routes
$app->router->post("/suggest", [\app\controllers\SuggestController::class, "store"]);


$app->run();
